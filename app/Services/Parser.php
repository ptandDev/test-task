<?php
namespace App\Services;

use Curl\MultiCurl;

set_time_limit(0);

class Parser
{
    private $response = [];
    private $flag = 1;

    public function getData() {
        $limit = $page = 0;

        while ($this->flag) {
            $multiCurl = new MultiCurl();
            $limit += 10;

            while ($page <= $limit) {
                $page++;
                $multiCurl->addGet('https://www.lostfilm.tv/new/page_'.$page);
            }

            $multiCurl->success(function($instance)
            {
                if ($instance->httpStatusCode == 200) {
                    preg_match_all('`<div class="name-ru">(.*?)</div>`', $instance->response, $names);
                    preg_match_all('`<div class="alpha">(.*?)</div>`', $instance->response, $alphas);
                    preg_match_all('`<a href="(.*?)"`', $instance->response, $link);
                    preg_match('`<div class="next-link">(.*?)</div>`', $instance->response, $end);
                }

                if (!empty($end)) {
                    $this->flag = 0;
                }

                if (isset($alphas[1])) {
                    for ($i=0; $i<count($alphas[1]); $i+=2) {
                        $episode[] = isset($alphas[1][$i]) ? trim($alphas[1][$i]) : null;
                    }

                    for ($i=1; $i<count($alphas[1]); $i+=2) {
                        $date[] = isset($alphas[1][$i]) ? trim(explode(':', $alphas[1][$i])[1]) : null;
                    }
                }

                if (isset($link[1])) {
                    foreach ($link[1] as $item) {
                        $url = explode('/', $item);
                        if ($url[1] == 'series' AND isset($url[5]) AND empty($url[5])) {
                            $links[] = 'https://www.lostfilm.tv'.$item;
                        }
                    }
                }

                if (isset($names[1])) {
                    for ($i=0; $i<count($names[1]); $i++) {
                        $result = [
                            'name'    => isset($names[1][$i]) ? $names[1][$i] : null,
                            'episode' => isset($episode[$i]) ? $episode[$i] : null,
                            'date'    => isset($date[$i]) ? strtotime($date[$i]) : null,
                            'link'    => isset($links[$i]) ? $links[$i] : null
                        ];

                        $this->response[] = $result;
                    }
                }


            });

            $multiCurl->start();
            $multiCurl->close();
        }

        return $this->response;
    }
}
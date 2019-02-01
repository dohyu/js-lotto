<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class LotteryController extends Controller
{
    public function index()
    {
        $this->getNumbers();
    }

    public function getNumbers()
    {
        $client = new Client();
        $crawler = $client->request('POST', 'https://www.dhlottery.co.kr/gameResult.do', [
            'method'    => 'statByNumber',
            'sortOrder' => 'DESC',
            'srchType'  => 'dir',
            'sltBonus'  => 0
        ]);

        $numbers = [];

        $crawler->filter('span.ball_645')->each(function ($node) use (&$numbers) {
            array_push($numbers, $node->text());
        });

        print_r($numbers);
    }
}

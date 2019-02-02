<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class LotteryController extends Controller
{
    public function index()
    {
        return view('lottery.index');
    }

    public function create(Request $request)
    {
        $numbers = $this->getNumbers();

        // 일단 기존과 같이..
        $arr = array_chunk($numbers, 30);

        $firstArr = $arr[0];
        $secondArr = $arr[1];

        $repeat = $request->input('numbers');
        for ($i = 0; $i < $repeat; $i++) {
            shuffle($firstArr);
            shuffle($secondArr);

            $res = [];
            for ($j = 0; $j < 6; $j++) {
                array_push($res, sprintf("%02d", $firstArr[$j]));
            }

            asort($res);
            
            $lists[] = implode(', ', $res);
        }

        return view('lottery.create', compact('lists'));
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

        return $numbers;
    }
}

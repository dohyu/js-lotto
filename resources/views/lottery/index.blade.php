@extends('layouts.app')

<div class="container">
    <h1 class="page-header">게임선택</h1>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('lottery.create') }}" method="get">
                <div class="form-group">
                    <label for="numbers">게임수</label>
                    <select name="numbers" id="numbers" class="form-control">
                        <option value="1">1 게임</option>
                        <option value="2">2 게임</option>
                        <option value="3">3 게임</option>
                        <option value="4">4 게임</option>
                        <option value="5" selected>5 게임</option>
                        <option value="6">6 게임</option>
                        <option value="7">7 게임</option>
                        <option value="8">8 게임</option>
                        <option value="9">9 게임</option>
                        <option value="10">10 게임</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-lg form-control">1등 가즈아!</button>
                </div>
            </form>
        </div>
    </div>
</div>

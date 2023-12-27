<?php

namespace App\Http\Controllers;

use App\Services\ChannelService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    private ChannelService $sChannel;

    public function __construct()
    {
        $this->sChannel = new ChannelService();
    }

    /**
     * 获取电视墙频道列表
     * @param Request $request
     * @return JsonResponse
     */
    public function getPlayMenuList(Request $request): JsonResponse
    {
        return $this->sChannel->getPlayMenuList($request);
    }
}

<?php

namespace App\Services;

use App\Models\ChannelModel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChannelService
{
    private ChannelModel $mChannel;

    public function __construct()
    {
        $this->mChannel = new ChannelModel();
    }

    /**
     * 获取电视墙频道列表
     * @param Request $request
     * @return JsonResponse
     */
    public function getPlayMenuList(Request $request): JsonResponse
    {
        $list = $this->mChannel->newQuery()->with(['channel:id,channel_id,url'])->get([
            'id',
            'title',
            'country',
            'province',
            'genre',
            'logo',
            'type'
        ])->map(function ($item) {
            $item->country = !empty($item->country) ? $item->country : '全球';
            $item->province = !empty($item->province) ? $item->province : '暂无';
            if (!empty($item->genre)) {
                try {
                    $item->genre = json_decode($item->genre, true, 512, JSON_THROW_ON_ERROR);
                } catch (Exception $e) {
                    $item->genre = ["默认"];
                }
            } else {
                $item->genre = ["默认"];
            }
            foreach ($item->channel as $channel) {
                $channel->route = [
                    [
                        'uri' => $channel->url,
                        'grade' => 90,
                        'dpi' => 1080
                    ]
                ];
            }
            return $item;
        })->toArray();
        return response()->json($list, 200, [
            'Cache-Control' => 'no-cache, no-store, must-revalidate'
        ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

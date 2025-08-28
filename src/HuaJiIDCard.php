<?php

namespace RSHDSDK\HuaJiIDCard;

use Exception;

/**
 * 身份证号，姓名核验
 * 杭州华际云数科技有限公司
 * https://apis.baidu.com/store/detail/04277820-1f59-428d-a72f-4a746961fd75?_=1734933646460
 */
class HuaJiIDCard
{
    const URL = "https://idname.api.bdymkt.com/id_name/check";

    /**
     * @param string $appid
     * @param string $idCard
     * @param string $name
     * @return array
     * @throws Exception
     */
    public static function check($appid, $idCard, $name)
    {
        if (empty($appid)) {
            throw new \InvalidArgumentException('百度 app id 不能为空');
        }

        if (empty($idCard)) {
            throw new \InvalidArgumentException('身份证号不能为空');
        }

        if (empty($name)) {
            throw new \InvalidArgumentException('姓名不能为空');
        }

        $headers = array();
        array_push($headers, "X-Bce-Signature:AppCode/" . $appid);
        array_push($headers, "Content-Type" . ":" . "application/x-www-form-urlencoded");


        $bodys = "idcard={$idCard}&name={$name}";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_URL, self::URL);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);

        $response = curl_exec($curl); // 已经获取到内容，没有输出到页面上。

        curl_close($curl);

        return json_decode($response, true);

    }
}
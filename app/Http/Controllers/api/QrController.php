<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\QrRequest;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends ApiController
{
    const PATH_Text='files/text/';
    public function __invoke(QrRequest $request)
    {
        File::ensureDirectoryExists(self::PATH_Text);
        $svgFile = self::PATH_Text.md5(microtime(true)).".svg";
        QrCode::size("500")->generate($request->text,$svgFile);
        $svgFile = env("APP_URL").$svgFile;
        return $this->success('qr code generated successfully',["type" => "text" , "url" => $svgFile],201);

    }
}

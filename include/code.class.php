<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/11/12
 */
class ValidateCode {
    private $charset = '0123456789';	//随机因子
    private $code;							//验证码
    private $codelen = 4;					//验证码长度
    private $width = 48;					//宽度
    private $height = 28;					//高度
    private $img;								//图形资源句柄
    private $fontcolor;						//指定字体颜色

    //生成随机码
    private function createCode() {
        $_len = strlen($this->charset)-1;
        for ($i=0;$i<$this->codelen;$i++) {
            $this->code .= $this->charset[mt_rand(0,$_len)];
        }
    }

    //生成背景
    private function createBg() {
        $this->img = imagecreatefrompng(DISCUZ_ROOT . './source/plugin/bc_jiedai/images/bg_code'.mt_rand(1,3).'.png');
    }

    //生成文字
    private function createFont() {
        $_x = $this->width / $this->codelen;
        for ($i=0;$i<$this->codelen;$i++) {
            $this->fontcolor = imagecolorallocate($this->img,mt_rand(200, 255),mt_rand(200, 255),mt_rand(200, 255));
            imagestring($this->img,5, $_x * $i/1.1 + $this->width/8, 7, $this->code[$i], $this->fontcolor);
        }
    }

    //输出
    private function outPut() {
        ob_clean();
        header('Content-type:image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }

    //对外生成
    public function doimg() {
        $this->createBg();
        $this->createCode();
        $this->createFont();
        $this->outPut();
    }

    //获取验证码
    public function getCode() {
        return strtolower($this->code);
    }

}
?>
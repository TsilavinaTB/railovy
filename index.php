<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<h1>TEST RAILOVY</h1>
<?php
$rslt =  file_put_contents("Tmpfile.zip", file_get_contents(
  "https:\/\/r4---sn-q0c7rn76.googlevideo.com\/videoplayback?expire=1613573366&ei=ltgsYJKELpykxN8PoemQsAQ&ip=54.216.49.37&id=o-AOdGpvHqLsBNrxaRFF2QLRHQa7tqP1PiFnot-xkVbWo3&itag=18&source=youtube&requiressl=yes&mh=XU&mm=31%2C26&mn=sn-q0c7rn76%2Csn-5hne6nsd&ms=au%2Conr&mv=m&mvi=4&pl=19&initcwndbps=437500&vprv=1&mime=video%2Fmp4&ns=6mHOlpqbhwljQ5fpmwrcmdAF&gir=yes&clen=15947905&ratebypass=yes&dur=229.970&lmt=1613377956187294&mt=1613551485&fvip=4&c=WEB&txp=5310224&n=hUmHJ5TCOWGmRHt1U&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cns%2Cgir%2Cclen%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRgIhANgKzrIB_R_g9wPwtxzcU7dRy_EIN-FcxyoSEWEduggIAiEAlf48-7PUdH9WwEyi4t-qILXULDEqZ6q0xvll6AwcAcI%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRAIgEP9uBYI3_AW4WjqNtEax_Y1pCSYhPBvGX4Dy_kb9vyMCIAnumN9xgpPuXoNns7ZLVExjc9CvsraeoaXKE7vvP-Ke"
));
$rslt = fflush(__DIR__);

var_dump($rslt);

?>

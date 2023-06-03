<!DOCTYPE html>
<html>

<head>
    <title>SIMLOG SLIDE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        @-webkit-keyframes ticker {
            0% {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                visibility: visible;
            }

            100% {
                -webkit-transform: translate3d(-100%, 0, 0);
                transform: translate3d(-100%, 0, 0);
            }
        }

        @keyframes ticker {
            0% {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                visibility: visible;
            }

            100% {
                -webkit-transform: translate3d(-100%, 0, 0);
                transform: translate3d(-100%, 0, 0);
            }
        }

        .ticker-wrap {
            position: fixed;
            bottom: 0;
            width: 100%;
            overflow: hidden;
            height: 4rem;
            background-color: #fff;
            padding-left: 100%;
        }

        .ticker {
            display: inline-block;
            height: 4rem;
            line-height: 4rem;
            white-space: nowrap;
            padding-right: 100%;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            -webkit-animation-name: ticker;
            animation-name: ticker;
            -webkit-animation-duration: 30s;
            animation-duration: 30s;
        }

        .ticker_item {
            display: inline-block;
            padding: 0 2rem;
            font-size: 2rem;
            color: #00ab4e;
        }
    </style>
</head>

<body>
    <iframe id="frame" style="height: 900px; overflow:scroll; width: 100%" marginheight="1" marginwidth="1"
        name="cboxmain" id="cboxmain" seamless="seamless" scrolling="no" frameborder="0"
        allowtransparency="true"></iframe>


    <div class="ticker-wrap">
        <div class="ticker">
            <div class="ticker_item">Selamat datang di SIMLOG (Sistem Informasi Logistik) | Developement By TFF Politeknik Caltex Riau - Pada Sistem ini terdapat beberapa fitur seperti management outlet, gudang, dan anggaran - Admin dapat mengatur role pada user untuk mengizinkan akses pada fitur tersentu</div>
        </div>
    </div>
    <script>
        var frames = Array('<?= base_url()?>admin/dashboard', 5,
            '<?= base_url()?>admin/outlet', 5,
            '<?= base_url()?>admin/gudang', 5,
            '<?= base_url()?>admin/anggaran', 5,
            '<?= base_url()?>admin/users', 5);
        var i = 0, len = frames.length;
        function ChangeSrc() {
            if (i >= len) { i = 0; } // start over
            document.getElementById('frame').src = frames[i++];
            setTimeout('ChangeSrc()', (frames[i++] * 1000));
        }
        window.onload = ChangeSrc;
    </script>
</body>

</html>
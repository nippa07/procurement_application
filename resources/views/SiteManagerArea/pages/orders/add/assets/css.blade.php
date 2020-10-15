<style>
    .wizard {
        width: 100%;
    }

    .wizard>.steps .current-info,
    .wizard>.content>.title {
        position: absolute;
        left: -99999px;
    }

    .wizard>.content {
        position: relative;
        width: auto;
        padding: 0;
    }

    .wizard>.content>.body {
        padding: 0 40px;
    }

    .wizard>.content>iframe {
        border: 0 none;
        width: 100%;
        height: 100%;
    }

    .wizard>.steps {
        position: relative;
        display: block;
        width: 100%;
    }

    .wizard>.steps>ul {
        display: table;
        width: 100%;
        table-layout: fixed;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .wizard>.steps>ul>li {
        display: table-cell;
        width: auto;
        vertical-align: top;
        text-align: center;
        position: relative;
        font-family: 'AvenirNextDemiBold', 'Helvetica', 'Arial', sans-serif !important;
    }

    .wizard>.steps>ul>li a {
        position: relative;
        padding-top: 48px;
        margin-top: 40px;
        margin-bottom: 40px;
        display: block;
    }

    .wizard>.steps>ul>li:before,
    .wizard>.steps>ul>li:after {
        content: '';
        display: block;
        position: absolute;
        top: 58px;
        width: 50%;
        height: 2px;
        background-color: #76BD1D;
        z-index: 9;
    }

    .wizard>.steps>ul>li:before {
        left: 0;
    }

    .wizard>.steps>ul>li:after {
        right: 0;
    }

    .wizard>.steps>ul>li:first-child:before,
    .wizard>.steps>ul>li:last-child:after {
        content: none;
    }

    .wizard>.steps>ul>li.current:after,
    .wizard>.steps>ul>li.current~li:before,
    .wizard>.steps>ul>li.current~li:after {
        background-color: #eeeeee;
    }

    .wizard>.steps>ul>li.current>a {
        color: #76BD1D;
        cursor: default;
    }

    .wizard>.steps>ul>li.current .number {
        border-color: #76BD1D;
        color: #76BD1D;
    }

    /*.wizard > .steps > ul > li.current .number:after {
    content: '\e913';
    font-family: 'icomoon';
    display: inline-block;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    line-height: 34px;
    -webkit-transition: all 0.15s ease-in-out;
    -o-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
    }*/
    .wizard>.steps>ul>li.disabled a,
    .wizard>.steps>ul>li.disabled a:hover,
    .wizard>.steps>ul>li.disabled a:focus {
        color: #A5AEB7;
        cursor: default;
    }

    .wizard>.steps>ul>li.done a,
    .wizard>.steps>ul>li.done a:hover,
    .wizard>.steps>ul>li.done a:focus {
        color: #76BD1D;
    }

    .wizard>.steps>ul>li.done .number {

        background-color: #76BD1D;
        border-color: #76BD1D;
        color: #fff;
    }

    .wizard>.steps>ul>li.done .number:after {

        font-family: 'icomoon';
        display: inline-block;
        font-size: 16px;
        line-height: 34px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
    }

    .wizard>.steps>ul>li.error .number {
        border-color: #F44336;
        color: #F44336;
    }

    .error {
        font-size: 1rem;
        position: relative;
        line-height: 1;
        width: 100%;
    }

    @media (max-width: 768px) {
        .wizard>.steps>ul {
            margin-bottom: 20px;
        }

        .wizard>.steps>ul>li {
            display: block;
            float: left;
            width: 33%;
        }

        .wizard>.steps>ul>li>a {
            margin-bottom: 0;
        }

        .wizard>.steps>ul>li:first-child:before,
        .wizard>.steps>ul>li:last-child:after {
            content: '';
        }

        .wizard>.steps>ul>li:last-child:after {
            background-color: #00BCD4;
        }
    }

    @media (max-width: 480px) {
        .wizard>.steps>ul>li {
            width: 33%;
        }

        .wizard>.steps>ul>li.current:after {
            background-color: #76BD1D;
        }
    }

    .wizard>.steps .number {
        background-color: #fff;
        color: #A5AEB7;
        display: inline-block;
        position: absolute;
        top: 0;
        left: 50%;
        margin-left: -19px;
        width: 38px;
        height: 38px;
        border: 2px solid #eeeeee;
        font-size: 14px;
        border-radius: 50%;
        z-index: 10;
        line-height: 34px;
        text-align: center;
    }

    .panel-flat>.wizard>.steps>ul {
        border-top: 1px solid #ddd;
    }

    .wizard>.actions {
        position: relative;
        display: block;
        text-align: right;
        padding: 40px;
        padding-top: 20px;
    }

    .wizard>.actions>ul {
        float: left;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .wizard>.actions>ul:after {
        content: '';
        display: table;
        clear: both;
    }

    .wizard>.actions>ul>li {
        float: left;
    }

    .wizard>.actions>ul>li+li {
        margin-left: 10px;
    }

    .wizard>.actions>ul>li>a {
        background: #76BD1D;
        color: #fff;
        display: block;
        padding: 10px 25px;
        font-family: 'AvenirNextDemiBold', 'Helvetica', 'Arial', sans-serif !important;
        border-radius: 0px;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
        border: 2px solid #76BD1D;
    }

    .wizard>.actions>ul>li>a:hover,
    .wizard>.actions>ul>li>a:focus {}

    .wizard>.actions>ul>li>a:active {}

    .wizard>.actions>ul>li>a[href="#previous"] {
        background-color: #fff;
        color: #4A4A49;
        border: 2px solid #EDEDED;
    }

    .wizard>.actions>ul>li>a[href="#previous"]:hover,
    .wizard>.actions>ul>li>a[href="#previous"]:focus {}

    .wizard>.actions>ul>li>a[href="#previous"]:active {}

    .wizard>.actions>ul>li.disabled>a,
    .wizard>.actions>ul>li.disabled>a:hover,
    .wizard>.actions>ul>li.disabled>a:focus {
        background-color: #fff;
        color: #4A4A49;
        border: 2px solid #EDEDED;
    }

    .wizard>.actions>ul>li.disabled>a[href="#previous"],
    .wizard>.actions>ul>li.disabled>a[href="#previous"]:hover,
    .wizard>.actions>ul>li.disabled>a[href="#previous"]:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    label {
        display: block;
    }

    label.error {
        color: red;
        font-size: 1rem !important;
    }

    .wizard>.actions>ul>li>a {
        background: #000f29;
        border: 2px solid #000000;
    }

    .wizard>.steps>ul>li.current .number {
        background: #5d72e4;
        border: 2px solid #5d72e4 !important;
        color: #fff;
        font-weight: 900;
    }

    li.current>a {
        color: #000f29;
        cursor: default;
    }

    .wizard>.steps>ul>li.current>a {
        color: #000f29;
        cursor: default;
    }

    .wizard>.steps>ul>li.done .number {
        background: #000f29;
        border: 2px solid #000000 !important;
        color: #fff;
    }

    .wizard>.steps>ul>li:before {
        background: #000f29;
    }

    .wizard>.steps>ul>li:before,
    .wizard>.steps>ul>li:after {
        background: #000f29;
    }

    .wizard>.steps>ul>li.done a {
        color: #000f29;
    }

    .wizard>.steps>ul>li.done a:hover {
        color: #000f29;
    }


    .range {
        -webkit-appearance: none;
        -moz-appearance: none;
        /* position: absolute; */
        /* left: 50%; */
        /* top: 5px; */
        width: 100%;
        margin-top: 10px;
        /* transform: translate(-50%, -50%); */
        z-index: 1000000000001;
        margin-bottom: 50px;
    }

    input[type=range]::-webkit-slider-runnable-track {
        -webkit-appearance: none;
        background: rgba(76, 175, 80, 1);
        background: -moz-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(76, 175, 80, 1)), color-stop(25%, rgba(205, 220, 57, 1)), color-stop(51%, rgba(255, 152, 0, 1)), color-stop(100%, rgba(244, 67, 54, 1)));
        background: -webkit-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: -o-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: -ms-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='rgba(76,175,80,1) ', endColorstr='rgba(244,67,54,1) ', GradientType=1);
        height: 2px;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]::-moz-range-track {
        -moz-appearance: none;
        background: rgba(76, 175, 80, 1);
        background: -moz-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(76, 175, 80, 1)), color-stop(25%, rgba(205, 220, 57, 1)), color-stop(51%, rgba(255, 152, 0, 1)), color-stop(100%, rgba(244, 67, 54, 1)));
        background: -webkit-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: -o-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: -ms-linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        background: linear-gradient(45deg, rgba(76, 175, 80, 1) 0%, rgba(205, 220, 57, 1) 25%, rgba(255, 152, 0, 1) 51%, rgba(244, 67, 54, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='rgba(76,175,80,1) ', endColorstr='rgba(244,67,54,1) ', GradientType=1);
        height: 2px;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        border: 2px solid;
        border-radius: 50%;
        height: 25px;
        width: 25px;
        max-width: 80px;
        position: relative;
        bottom: 11px;
        background-color: #1d1c25;
        cursor: -webkit-grab;

        -webkit-transition: border 1000ms ease;
        transition: border 1000ms ease;
    }

    input[type=range]::-moz-range-thumb {
        -moz-appearance: none;
        border: 2px solid;
        border-radius: 50%;
        height: 25px;
        width: 25px;
        max-width: 80px;
        position: relative;
        bottom: 11px;
        background-color: #1d1c25;
        cursor: -moz-grab;
        -moz-transition: border 1000ms ease;
        transition: border 1000ms ease;
    }



    .range.blue::-webkit-slider-thumb {
        border-color: rgba(76, 175, 80, 1);
    }

    .range.ltpurple::-webkit-slider-thumb {
        border-color: rgba(205, 220, 57, 1);
    }

    .range.purple::-webkit-slider-thumb {
        border-color: rgba(255, 152, 0, 1);
    }

    .range.pink::-webkit-slider-thumb {
        border-color: rgba(244, 67, 54, 1);
    }

    .range.blue::-moz-range-thumb {
        border-color: rgba(76, 175, 80, 1);
    }

    .range.ltpurple::-moz-range-thumb {
        border-color: rgba(205, 220, 57, 1);
    }

    .range.purple::-moz-range-thumb {
        border-color: rgba(255, 152, 0, 1);
    }

    .range.pink::-moz-range-thumb {
        border-color: rgba(244, 67, 54, 1);
    }

    input[type=range]::-webkit-slider-thumb:active {
        cursor: -webkit-grabbing;
    }

    input[type=range]::-moz-range-thumb:active {
        cursor: -moz-grabbing;
    }

</style>

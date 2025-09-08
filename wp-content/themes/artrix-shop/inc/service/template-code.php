<?php

/**
 * 邮件发送模板
 */
?>
<html lang="cn">

<head>
    <title>Artrix：Cannabis Vape Hardware, Markeing, Strategy.</title>
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
                width: 100% !important;
                max-width: 100%;
            }
        }
    </style>
    <style type="text/css">
        @media only screen and (max-width:480px) {
            table.mj-full-width-mobile {
                width: 100% !important;
            }

            td.mj-full-width-mobile {
                width: auto !important;
            }
        }
    </style>
</head>

<body style="background-color:#ffffff;">
    <div style="background-color:#ffffff;">
        <div style="margin:0px auto;max-width:600px;">
            <div style="font-size:0px;padding:10px 25px;word-break:break-word;">
                <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                    <h1
                        style="margin: 0; font-size: 24px; line-height: normal; font-weight: bold;">
                        Artrixglobal
                    </h1>
                </div>
            </div>
        </div>
        <div style="margin:0px auto;max-width:600px;">
            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="vertical-align:top;" width="100%">
                <tr>
                    <td align="left"
                        style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div
                            style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                            Hello <?php echo $email ?> </div>
                    </td>
                </tr>
                <tr>
                    <td align="left"
                        style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div
                            style="font-family:Helvetica, Arial, sans-serif;font-size:20px;font-weight:800;line-height:24px;text-align:left;color:#f00000;">
                            <?php echo $sms_code ?> </div>
                    </td>
                </tr>
                <tr>
                    <td align="left"
                        style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div
                            style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:00;line-height:24px;text-align:left;color:#434245;">
                            You are executing<strong> <?php echo $type_name ?> </strong>. We won't ask you for a verification code, and don't tell anyone else</div>
                    </td>
                </tr>
                <tr>
                    <td align="left"
                        style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div
                            style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#434245;">
                            Artrix
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin:0px auto;max-width:600px;">
            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="vertical-align:top;" width="100%">
                <tr>
                    <td align="left"
                        style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div
                            style="font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:left;color:#999999;">
                            If you have any questions please contact email: <a
                                href="mailto:info@artrixglobal.com"
                                style="color: #f00000; text-decoration: none;">
                                info@artrixglobal.com. </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left"
                        style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                            © [Artrix] Inc.</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
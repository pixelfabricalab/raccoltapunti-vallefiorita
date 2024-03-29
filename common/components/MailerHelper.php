<?php 
    namespace common\components;

    use Yii;
    use common\components\Request;

    class MailerHelper {
        public function getTemplate($titolo, $esito) {
            $link_ocr = "https://demoapp-raccoltapunti.pixelfabrica.it/frontend/web/logs/_batchocroutput.txt";
            $link_cli = "https://demoapp-raccoltapunti.pixelfabrica.it/frontend/web/logs/_cli.txt";
            $htmlbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    
                    <!-- Facebook sharing information tags -->
                    <meta property="og:title" content="*|MC:SUBJECT|*" />
                    
                    <title>*|MC:SUBJECT|*</title>
                    <style type="text/css">
                        /* Client-specific Styles */
                        #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
                        body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
                        body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
            
                        /* Reset Styles */
                        body{margin:0; padding:0;}
                        img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
                        table td{border-collapse:collapse;}
                        #backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
            
                        /* Template Styles */
            
                        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */
            
                        /**
                        * @tab Page
                        * @section background color
                        * @tip Set the background color for your email. You may want to choose one that matches your companys branding.
                        * @theme page
                        */
                        body, #backgroundTable{
                            /*@editable*/ background-color:#FAFAFA;
                        }
            
                        /**
                        * @tab Page
                        * @section email border
                        * @tip Set the border for your email.
                        */
                        #templateContainer{
                            /*@editable*/ border: 1px solid #DDDDDD;
                        }
            
                        /**
                        * @tab Page
                        * @section heading 1
                        * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
                        * @style heading 1
                        */
                        h1, .h1{
                            /*@editable*/ color:#202020;
                            display:block;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:34px;
                            /*@editable*/ font-weight:bold;
                            /*@editable*/ line-height:100%;
                            margin-top:0;
                            margin-right:0;
                            margin-bottom:10px;
                            margin-left:0;
                            /*@editable*/ text-align:left;
                        }
            
                        /**
                        * @tab Page
                        * @section heading 2
                        * @tip Set the styling for all second-level headings in your emails.
                        * @style heading 2
                        */
                        h2, .h2{
                            /*@editable*/ color:#202020;
                            display:block;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:30px;
                            /*@editable*/ font-weight:bold;
                            /*@editable*/ line-height:100%;
                            margin-top:0;
                            margin-right:0;
                            margin-bottom:10px;
                            margin-left:0;
                            /*@editable*/ text-align:left;
                        }
            
                        /**
                        * @tab Page
                        * @section heading 3
                        * @tip Set the styling for all third-level headings in your emails.
                        * @style heading 3
                        */
                        h3, .h3{
                            /*@editable*/ color:#202020;
                            display:block;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:26px;
                            /*@editable*/ font-weight:bold;
                            /*@editable*/ line-height:100%;
                            margin-top:0;
                            margin-right:0;
                            margin-bottom:10px;
                            margin-left:0;
                            /*@editable*/ text-align:left;
                        }
            
                        /**
                        * @tab Page
                        * @section heading 4
                        * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
                        * @style heading 4
                        */
                        h4, .h4{
                            /*@editable*/ color:#202020;
                            display:block;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:22px;
                            /*@editable*/ font-weight:bold;
                            /*@editable*/ line-height:100%;
                            margin-top:0;
                            margin-right:0;
                            margin-bottom:10px;
                            margin-left:0;
                            /*@editable*/ text-align:left;
                        }
            
                        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */
            
                        /**
                        * @tab Header
                        * @section preheader style
                        * @tip Set the background color for your email preheader area.
                        * @theme page
                        */
                        #templatePreheader{
                            /*@editable*/ background-color:#FAFAFA;
                        }
            
                        /**
                        * @tab Header
                        * @section preheader text
                        * @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.
                        */
                        .preheaderContent div{
                            /*@editable*/ color:#505050;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:10px;
                            /*@editable*/ line-height:100%;
                            /*@editable*/ text-align:left;
                        }
            
                        /**
                        * @tab Header
                        * @section preheader link
                        * @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.
                        */
                        .preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{
                            /*@editable*/ color:#336699;
                            /*@editable*/ font-weight:normal;
                            /*@editable*/ text-decoration:underline;
                        }
            
                        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */
            
                        /**
                        * @tab Header
                        * @section header style
                        * @tip Set the background color and border for your emails header area.
                        * @theme header
                        */
                        #templateHeader{
                            /*@editable*/ background-color:#FFFFFF;
                            /*@editable*/ border-bottom:0;
                        }
            
                        /**
                        * @tab Header
                        * @section header text
                        * @tip Set the styling for your emails header text. Choose a size and color that is easy to read.
                        */
                        .headerContent{
                            /*@editable*/ color:#202020;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:34px;
                            /*@editable*/ font-weight:bold;
                            /*@editable*/ line-height:100%;
                            /*@editable*/ padding:0;
                            /*@editable*/ text-align:center;
                            /*@editable*/ vertical-align:middle;
                        }
            
                        /**
                        * @tab Header
                        * @section header link
                        * @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.
                        */
                        .headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
                            /*@editable*/ color:#336699;
                            /*@editable*/ font-weight:normal;
                            /*@editable*/ text-decoration:underline;
                        }
            
                        #headerImage{
                            height:auto;
                            max-width:600px !important;
                        }
            
                        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */
            
                        /**
                        * @tab Body
                        * @section body style
                        * @tip Set the background color for your emails body area.
                        */
                        #templateContainer, .bodyContent{
                            /*@editable*/ background-color:#FFFFFF;
                        }
            
                        /**
                        * @tab Body
                        * @section body text
                        * @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.
                        * @theme main
                        */
                        .bodyContent div{
                            /*@editable*/ color:#505050;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:14px;
                            /*@editable*/ line-height:150%;
                            /*@editable*/ text-align:left;
                        }
            
                        /**
                        * @tab Body
                        * @section body link
                        * @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.
                        */
                        .bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
                            /*@editable*/ color:#336699;
                            /*@editable*/ font-weight:normal;
                            /*@editable*/ text-decoration:underline;
                        }
            
                        .bodyContent img{
                            display:inline;
                            height:auto;
                        }
            
                        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */
            
                        /**
                        * @tab Footer
                        * @section footer style
                        * @tip Set the background color and top border for your emails footer area.
                        * @theme footer
                        */
                        #templateFooter{
                            /*@editable*/ background-color:#FFFFFF;
                            /*@editable*/ border-top:0;
                        }
            
                        /**
                        * @tab Footer
                        * @section footer text
                        * @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.
                        * @theme footer
                        */
                        .footerContent div{
                            /*@editable*/ color:#707070;
                            /*@editable*/ font-family:Arial;
                            /*@editable*/ font-size:12px;
                            /*@editable*/ line-height:125%;
                            /*@editable*/ text-align:left;
                        }
            
                        /**
                        * @tab Footer
                        * @section footer link
                        * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
                        */
                        .footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
                            /*@editable*/ color:#336699;
                            /*@editable*/ font-weight:normal;
                            /*@editable*/ text-decoration:underline;
                        }
            
                        .footerContent img{
                            display:inline;
                        }
            
                        /**
                        * @tab Footer
                        * @section social bar style
                        * @tip Set the background color and border for your emails footer social bar.
                        * @theme footer
                        */
                        #social{
                            /*@editable*/ background-color:#FAFAFA;
                            /*@editable*/ border:0;
                        }
            
                        /**
                        * @tab Footer
                        * @section social bar style
                        * @tip Set the background color and border for your emails footer social bar.
                        */
                        #social div{
                            /*@editable*/ text-align:center;
                        }
            
                        /**
                        * @tab Footer
                        * @section utility bar style
                        * @tip Set the background color and border for your emails footer utility bar.
                        * @theme footer
                        */
                        #utility{
                            /*@editable*/ background-color:#FFFFFF;
                            /*@editable*/ border:0;
                        }
            
                        /**
                        * @tab Footer
                        * @section utility bar style
                        * @tip Set the background color and border for your emails footer utility bar.
                        */
                        #utility div{
                            /*@editable*/ text-align:center;
                        }
            
                        #monkeyRewards img{
                            max-width:190px;
                        }
                    </style>
                </head>
                <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
                    <center>
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
                <tr>
                        <td align="center" valign="top">
                        <!-- // Begin Template Preheader \\ -->
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">
                            <tr>
                                <td valign="top" class="preheaderContent">
            
                                        <!-- // Begin Module: Standard Preheader \ -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                        <tr>
                                                <td valign="top">
                                                <div mc:edit="std_preheader_content">
                                                         Non rispondere a questa email. Do not reply to this email.
                                                </div>
                                            </td>
                                            <!-- *|IFNOT:ARCHIVE_PAGE|* -->
                                                                                        <td valign="top" width="190">
                                                &nbsp;
                                            </td>
                                                                                        <!-- *|END:IF|* -->
                                        </tr>
                                    </table>
                                        <!-- // End Module: Standard Preheader \ -->
            
                                </td>
                            </tr>
                        </table>
                        <!-- // End Template Preheader \\ -->
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                                <tr>
                                <td align="center" valign="top">
                                    <!-- // Begin Template Header \\ -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                        <tr>
                                            <td class="headerContent">
            
                                                <!-- // Begin Module: Standard Header Image \\ -->
                                                <!-- <img src="https://discere-guest.pusc.it/web/assets/img/mail/header-mail.png" style="max-width:600px;" id="headerImage campaign-icon" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext />-->
                                                <!-- // End Module: Standard Header Image \\ -->
            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Header \\ -->
                                </td>
                            </tr>            
                            <tr>
                    <td align="center" valign="top">
                        <!-- // Begin Template Body \\ -->
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                            <tr>
                                <td valign="top" class="bodyContent">
                                                        <!-- // Begin Module: Standard Content \\ -->
                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="top">
                                                <div mc:edit="std_content00">
                                                    <p style="font-size:22px; line-height: 24px;"><strong>'. $titolo .'</strong><br />
                                                    Esito: '. $esito .'</p>
                                                    <p>Salve<br />
                                                        Ecco il risultato della scansione OCR degli ultimi scontrini caricati sull\'applicazione.<br />
                                                        Trovi tutto in allegato.<br /><br />
                                                        Trovi il file OCR qui: <a href="'. $link_ocr .'">LOG OCR</a><br />
                                                        Il file di log CLI invece è <a href="'.$link_cli .'">LOG CLI</a><br /><br/>
                                                        <small>N.B. I log non vengono azzerati, se non manualmente.</small>
                                                        </p>
                                                        <br>
                                                    <hr>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Module: Standard Content \\ -->
            
                                </td>
                            </tr>
                        </table>
                        <!-- // End Template Body \\ -->
                    </td>
                </tr>    
                                <tr>
                                <td align="center" valign="top">
                                    <!-- // Begin Template Footer \\ -->
                                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
                                        <tr>
                                                <td valign="top" class="footerContent">
            
                                                <!-- // Begin Module: Standard Footer \\ -->
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top" width="350">
                                                            <div mc:edit="std_footer">
                                                                <strong>Pixelfabrica</strong>
                                                                <br />
                                                                Via Barisano da Trani, 6 <br/>
                                                                00186 Roma RM
                                                            </div>
                                                        </td>
                                                        <td valign="top" width="190" id="monkeyRewards">
                                                            <div>
                                                                <em>Copyright &copy; 2021, All rights reserved.</em>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                                                            </table>
                                                <!-- // End Module: Standard Footer \\ -->
            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Footer \\ -->
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
            </table>    
                        
                    </center>
                </body>
            </html>';
            return $htmlbody;
        }

        public function inviaMail($oggetto, $titolo, $esito, $testmail = false) {
            //$oggetto = '';
            $request = new Request;
            $url = $request->getBaseUrl();
            $emailsender = 'ocr@pixelfabrica.it';
            if ($testmail == false) {
                $to = ['andrea.coi@pixelfabrica.biz', 'vincent.veri@pixelfabrica.biz', 'fabrizio.antinozzi@pixelfabrica.biz', 'alessandro.testa@pixelfabrica.biz'];
            } else {
                $to = ['andrea.coi@pixelfabrica.biz'];
            }
            Yii::$app->mailer->compose()
            ->setFrom($emailsender)
            ->setTo($to)
            ->setSubject($oggetto)
            ->setHtmlBody($this->getTemplate($titolo, $esito))
            // consigliato path assoluto
            ->send();
        }
    }
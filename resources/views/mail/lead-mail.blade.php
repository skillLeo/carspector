<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"> <!-- wichtig für Mobil -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Danke für deine Anfrage</title>
    <style>
        /* Basis-Resets */
        html,body { margin:0 !important; padding:0 !important; height:100% !important; width:100% !important; }
        * { -ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; }
        table, td { mso-table-lspace:0pt; mso-table-rspace:0pt; }
        img { -ms-interpolation-mode:bicubic; border:0; outline:none; text-decoration:none; }
        a { text-decoration:none; }
        /* Dark-mode-Failsafe (einfach) */
        @media (prefers-color-scheme: dark) {
            .bg-body { background:#0f1720 !important; }
            .bg-card { background:#111827 !important; }
            .text-muted { color:#9ca3af !important; }
            .text { color:#e5e7eb !important; }
            .btn { background:#3b82f6 !important; }
            .note { background:#3b2a12 !important; border-color:#b45309 !important; color:#fde68a !important; }
        }
        /* Mobile */
        @media screen and (max-width:600px) {
            .container { width:100% !important; max-width:100% !important; }
            .px-30 { padding-left:16px !important; padding-right:16px !important; }
            .p-30 { padding:20px !important; }
            h1 { font-size:22px !important; line-height:1.3 !important; }
            .lead { font-size:15px !important; }
            .btn { display:block !important; width:100% !important; text-align:center !important; }
            .alt-link { word-break:break-all !important; }
        }
    </style>
    <!--[if mso]>
    <style>
        .fallback-font { font-family: Arial, sans-serif !important; }
    </style>
    <![endif]-->
</head>
<body class="bg-body" style="margin:0; padding:0; background:#f3f4f6;">
<!-- Vollbreite Hintergrund-Tabelle -->
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f4f6;">
    <tr>
        <td align="center" style="padding:32px 12px;">
            <!--[if mso]>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600">
                <tr><td>
            <![endif]-->

            <!-- Card / Container -->
            <table role="presentation" class="container" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width:600px; background:#ffffff; border-radius:8px; overflow:hidden;">
                <!-- Header -->
                <tr>
                    <td class="p-30 fallback-font" style="padding:30px; text-align:center; font-family:Arial, Helvetica, sans-serif;">
                        <h1 class="fallback-font" style="margin:0 0 10px; font-size:24px; line-height:1.25; font-weight:700; color:#1f2937;">
                            Danke für deine Kontaktaufnahme
                        </h1>
                        <p class="lead text-muted fallback-font" style="margin:0; font-size:14px; color:#6b7280;">
                            Wir haben deine Anfrage erhalten. Wenn du direkt buchen möchtest, klicke unten auf den Button.
                        </p>
                    </td>
                </tr>



                <!-- CTA Button (bulletproof inkl. VML für Outlook) -->
                <tr>
                    <td align="center" class="px-30" style="padding:0 30px 20px;">
                        <!--[if mso]>
              <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="{{ route('inhalt',['email'=>$email]) }}" arcsize="8%" strokecolor="#2d3748" fillcolor="#2d3748" style="height:44px;v-text-anchor:middle;width:260px;">
                <w:anchorlock/>
                <center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px; font-weight:700;">
                  Jetzt Fahrzeug-Check buchen
                </center>
              </v:roundrect>
              <![endif]-->
                        <!--[if !mso]><!-- -->
                        <a class="btn fallback-font"
                           href="{{ route('inhalt',['email'=>$email]) }}"
                            style="display:inline-block; background:#2d3748 !important; color:#ffffff !important; font-size:16px; font-weight:600; padding:12px 24px; border-radius:6px; line-height:1; text-decoration:none;">
                            Jetzt Fahrzeug-Check buchen
                         </a>
                        <!--<![endif]-->
                        <p class="fallback-font alt-link" style="padding-top: 10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#6b7280; margin:10px 0 0;">
                            Alternativ-Link:
                            <a href="{{ route('inhalt',['email'=>$email]) }}" style="color:#6b7280; text-decoration:underline;">
                                {{ route('inhalt',['email'=>$email]) }}
                            </a>
                        </p>
                    </td>
                </tr>

                <!-- Kontaktinformationen -->
                <tr>
                    <td class="px-30 fallback-font" style="padding:0 30px 10px; font-family:Arial, Helvetica, sans-serif;">
                        <h2 style="margin:0 0 10px; font-size:16px; font-weight:700; color:#111827;">Kontakt</h2>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td class="fallback-font" style="font-size:14px; color:#111827; line-height:1.6; padding:0;">
                                    <p style="margin:0 0 6px;">Telefon: <a href="tel:+4921192325550" style="color:#111827; text-decoration:underline;">0211 / 92325550</a></p>
                                    <p style="margin:0 0 6px;">WhatsApp: <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20" style="color:#111827; text-decoration:underline;">Jetzt schreiben</a></p>
                                    <p style="margin:0 0 6px;">E-Mail: <a href="mailto:info@carspector.de" style="color:#111827; text-decoration:underline;">info@carspector.de</a></p>
                                    <p style="margin:6px 0 0;" class="text-muted">Erreichbar: Mo–Sa, 9–18 Uhr</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="p-30 fallback-font" style="padding:8px 30px 20px; text-align:center; font-family:Arial, Helvetica, sans-serif;">
                        <p style="font-size:14px; color:#000000; margin:0;">
                            Viele Grüße<br>Dein Carspector Team
                        </p>
                    </td>
                </tr>

            </table>

            <!--[if mso]>
            </td></tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>

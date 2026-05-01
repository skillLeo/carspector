<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"> <!-- wichtig für Mobil -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neue Fahrzeugprüfung</title>
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
                Neue Fahrzeugprüfung zugewiesen
              </h1>
              <p class="lead text-muted fallback-font" style="margin:0; font-size:14px; color:#6b7280;">
                Ihnen wurde eine neue Prüfung zugewiesen. Bitte melden Sie sich an, um die Prüfung zu starten.
              </p>
            </td>
          </tr>

          <!-- Zugangsdaten -->
        <tr>
  <td class="px-30 fallback-font" style="padding:0 30px 20px; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" class="bg-card"
      style="background:#f9fafb !important; border:1px solid #e5e7eb !important; border-radius:6px; color-scheme: light only;">
      <tr>
        <td class="fallback-font" style="padding:14px 16px; font-family:Arial, Helvetica, sans-serif; background:#f9fafb !important;">
          <p style="margin:0 0 8px; font-size:14px; font-weight:600; color:#111827 !important;">
            Ihre Zugangsdaten
          </p>
          <p class="text" style="margin:0; font-size:14px; color:#111827 !important;">
            <strong>Passwort:</strong>
            <span style="font-family:Consolas, 'Courier New', monospace; background:#eef2f7 !important; padding:2px 6px; border-radius:4px; color:#111827 !important;">
              {{$password}}
            </span>
          </p>
        </td>
      </tr>
    </table>
  </td>
</tr>


          <!-- CTA Button (bulletproof inkl. VML für Outlook) -->
          <tr>
            <td align="center" class="px-30" style="padding:0 30px 20px;">
              <!--[if mso]>
              <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="{{ route('examiner.login',['id'=>$booking['examiner_id'],'order_id'=>$booking->id]) }}" arcsize="8%" strokecolor="#2d3748" fillcolor="#2d3748" style="height:44px;v-text-anchor:middle;width:260px;">
                <w:anchorlock/>
                <center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px; font-weight:700;">
                  Zur Prüfung anmelden
                </center>
              </v:roundrect>
              <![endif]-->
              <!--[if !mso]><!-- -->
              <a class="btn fallback-font"
                 href="{{ route('examiner.login',['id'=>$booking['examiner_id'],'order_id'=>$booking->id]) }}"
                 style="display:inline-block; background:#2d3748 !important; color:#ffffff !important; font-size:16px; font-weight:600; padding:12px 24px; border-radius:6px; line-height:1; text-decoration:none;">
                Zur Prüfung anmelden
              </a>
              <!--<![endif]-->
              <p class="fallback-font alt-link" style="padding-top: 10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#6b7280; margin:10px 0 0;">
                Alternativ-Link:
                <a href="{{ route('examiner.login',['id'=>$booking['examiner_id'],'order_id'=>$booking->id]) }}" style="color:#6b7280; text-decoration:underline;">
                  {{ route('examiner.login',['id'=>$booking['examiner_id'],'order_id'=>$booking->id]) }}
                </a>
              </p>
            </td>
          </tr>

          <!-- Kurzanleitung -->
          <tr>
            <td class="px-30 fallback-font" style="padding:0 30px 10px; font-family:Arial, Helvetica, sans-serif;">
              <h2 style="margin:0 0 10px; font-size:16px; font-weight:700; color:#111827;">Kurzanleitung</h2>
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td class="fallback-font" style="font-size:14px; color:#111827; line-height:1.6; padding:0;">
                    <ol style="padding-bottom: 10px; margin:0 0 12px; padding-left:20px;">
                      <li><strong>Anmelden:</strong> Mit dem oben genannten Passwort einloggen</li>
                      <li><strong>Fahrzeug prüfen:</strong> Prüfpunkte bearbeiten und Bilder machen</li>
                      <li><strong>Prüfung abschließen:</strong> Im Hauptmenü den Auftrag abschließen</li>
                    </ol>
                    <div class="note" style="background:#fff7ed !important; border:1px solid #fbd38d !important; color:#9a3412 !important; border-radius:6px; padding:12px; font-size:13px; line-height:1.45;">
                      <strong>Achtung:</strong> Nachdem Sie im Hauptmenü <em>„Auftrag abschließen“</em> gewählt haben,
                      kann die Prüfung <strong>nicht mehr bearbeitet</strong> werden.
                      Sie können sich jederzeit vorher an- und abmelden, um die Bearbeitung fortzusetzen.
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        <tr>
        <td class="p-30 fallback-font" style="padding:8px 30px 20px; text-align:center; font-family:Arial, Helvetica, sans-serif;">
            <p style="font-size:14px; color:#000000; margin:0;">
            Mit freundlichen Grüßen<br>Ihr Team von Carspector
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

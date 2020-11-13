<html>
<head>
    <title>Dados enviados</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
        #backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            line-height: 100% !important;
        }
        table td {
            border-collapse: collapse;
            padding: 20px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        .bold {
            font-weight: bold;
        }
        .linktexto a{
            text-decoration: none;
            cursor: default;
            color: #062075;
        }
        .linktexto a:-webkit-any-link {
            cursor: default;
        }
    </style>
</head>
<body style="font-family: 'Verdana', 'Proxima Nova', 'Roboto'; background-image: -webkit-linear-gradient(-30deg, #ff0022 50%, #F5F5F5 50%); width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;">
    <div style="margin-top: -30px; padding: 30px 10px; background-position: top center; background-repeat: no-repeat; background-size: 100% 50vh;">
    
    <div style="width:100%; max-width:600px; background-color:#fff; margin: 20px auto; border-radius:5px;">        
        <table style="width:100%; font-size:15px; margin-top:30px; margin-bottom: -15px; position: relative; border:none;">
            <tr>
                <td>
                    <p style="margin: 0; font-size: 25px; font-weight: bold; color:  #ff0512 ;">Dados do contato
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Nome</strong>: <span>{{ $nome ?? 'N/A' }}</span><br />
                    <strong>E-mail</strong>: <span>{{ $email ?? 'N/A' }}</span><br />
                    <strong>Telefone</strong>: <span>{{ $telefone ?? 'N/A'}}</span><br />
                    <strong>IP</strong>: <span>{{ $ip ?? 'N/A'}}</span><br />
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{ $mensagem ?? 'N/A' }}</p>
                </td>
            </tr>
        </table>
    </div>
    <table style="width: 100%; max-width: 600px; margin: 0 auto; color: #9b9b9b">
        <tr>
            <td>
                <p style="color: #90A4Ae; font-size: 13px;">2020 © by Débora Castro</p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>

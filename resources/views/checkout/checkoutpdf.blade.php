<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        @font-face{
         font-family:  'THSarabunNew';
         font-style: normal;
         font-weight: normal;
         src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face{
         font-family:  'THSarabunNew';
         font-style: normal;
         font-weight: bold;
         src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face{
         font-family:  'THSarabunNew';
         font-style: italic;
         font-weight: normal;
         src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face{
         font-family:  'THSarabunNew';
         font-style: italic;
         font-weight: bold;
         src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
        body{
         font-family: "THSarabunNew";
         font-size: 16px;
         line-height: 10px
        }
        @page {
              size: A4;
              padding: 15px;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <h1 style="text-align: center">ใบเสร็จ (Receipt)</h1>
        </div>
        <div style="margin-right:auto">
            <h1 style="text-align: left">เว็บไซต์ผู้ให้บริการ</h1>
            <h3>www.xxxxxxx.com</h3>
            <h4>ดูสินค้าเพิ่มเติมได้ที่ www.xxxxxxx.com</h4>
        </div>
        <div style="margin-left:auto">
            <h1 style="text-align: right">เว็บไซต์ผู้ให้บริการ</h1>
            <h3 style="text-align: right">ชื่อ นาย รง ดอกทิพ</h3>
            <h4 style="text-align: right">ที่อยู่ 57/* 1ม 2 1556 ++++887987</h4>
        </div>
        <hr>
    </div>
</body>
</html>

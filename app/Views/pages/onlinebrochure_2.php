<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>網路購買簡章</title>
    <link rel="stylesheet" href="<?= base_url('css/mainarticle.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(69, 95, 192);">
    <?= $this->include("webframe/header") ?>
    <?= $this->include("webframe/sidebar") ?>
    <div class="mainarticle">
        <h1 class="title">網路購買簡章</h1>
        <h2 class="smalltitle">個別訂購簡章</h2>
        <ul style="font-size: 20px;">
          <li>步驟 1 ：	填寫招生簡章申購單</li>
          <li>步驟 2 ：	繳交簡章費用操作流程</li>
          <li>步驟 3 ：	查詢簡章費用及繳費帳號</li>
          <li>繳費後：	簡章費用入帳查詢</li>
        </ul>
        <h3 class="smalltitle">注意事項</h3>
        <ol style="font-size: 20px;">	
          <li>112學年度大學「申請入學」招生簡章發售日期：<br>自111年12月1日起至112年3月14日止</li>
          <br><br>
          <li>112年3月15日起因郵遞作業不及，恕無法提供網路購買服務，欲購買者請至<a href="downloadFile?item=112_applymw_Purchase_SaleRule.pdf" target="_blank">簡章發售辦法內各代售點</a>購買。</font></li>
          <br><br>
          <li>大學「申請入學」招生簡章購買費用：<b>每份180元</b>。<br>
            <font color=red>(個別網路購買另加掛號郵資65元)</font>
          </li>
          <br><br>
          <li>完成網路訂購簡章後，請持具有轉帳功能之金融卡至自動櫃員機(ATM)或以網路ATM轉帳繳款或列印「購買招生簡章繳費單」至便利商店、臺灣銀行、郵局進行繳款，或至各金融機構辦理跨行匯款。(至臺灣銀行繳款者，免收手續費)  <br>
          </li>
        </ol>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
  <style>
    .links a{
        font-size: 25px;
    }
    .links a:hover{
        color: rgb(220, 137, 137);
    }
    .smalltitle{
        font-size: 25px;
    }
  </style>
</html>
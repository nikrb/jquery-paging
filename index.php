<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    #max_rows_wrapper {
      text-align: right;
    }
    #paging_wrapper {
      text-align: center;
    }
    .table-container {
      margin: 10px auto;
      width: 50%;
    }
    .my-table {
      width: 100%;
      margin: 20px;
      border-collapse: collapse;
    }
    .my-table td, .my-table th {
      border: 1px solid #88a;
    }
    .btn {
      cursor: pointer;
      line-height: 1.5em;
      background-color: #88c;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class='table-container'>
  <div id='max_rows_wrapper'>
    <select id='max_rows_droplist'>
      <option value=3>3</option>
      <option value=5>5</option>
      <option value=10>10</option>
      <option value=25>25</option>
    </select>
  </div>
  <div>
    <table class='my-table'>
      <thead>
        <th>id</th></th><th>name</th><th>email</th>
      </thead>
      <tbody id='table_body'>
        
      </tbody>
    </table>
  </div>
  <div id='paging_wrapper'>
    
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src=/rets/rets2/paging/modules/Pager.js></script>

<script>
  var pager = 0;
  var data = [],
      page_no = 1,
      total_rows = 0;
  $(document).ready( function( $){
    pager = new Pager( "max_rows_droplist", "table_body", "paging_wrapper", data.length, getPageData);
  });
  
  function getPageData( display_rows, offset, total_rows){
    console.log( "getpagedata display[%d] offset[%d] total[%d]", display_rows, offset, total_rows);
    let pd = [];
    for( var i=offset; i < (offset+display_rows) && i<total_rows; i++){
      pd.push( { id: data[i].id, name: data[i].first_name, email: data[i].email});
    }
    return pd;
  }
  
  data = [
    {"id":1,"first_name":"Larry","last_name":"Ferguson","email":"lferguson0@myspace.com","gender":"Male","ip_address":"48.244.26.207"},
    {"id":2,"first_name":"Donald","last_name":"Gray","email":"dgray1@reverbnation.com","gender":"Male","ip_address":"34.16.51.194"},
    {"id":3,"first_name":"Walter","last_name":"Henry","email":"whenry2@cafepress.com","gender":"Male","ip_address":"177.143.41.172"},
    {"id":4,"first_name":"Sharon","last_name":"Andrews","email":"sandrews3@youtu.be","gender":"Female","ip_address":"231.224.253.159"},
    {"id":5,"first_name":"Harry","last_name":"Coleman","email":"hcoleman4@google.com","gender":"Male","ip_address":"139.133.156.0"},
    {"id":6,"first_name":"Benjamin","last_name":"Miller","email":"bmiller5@jigsy.com","gender":"Male","ip_address":"236.2.55.163"},
    {"id":7,"first_name":"Carolyn","last_name":"Bowman","email":"cbowman6@buzzfeed.com","gender":"Female","ip_address":"108.28.38.77"},
    {"id":8,"first_name":"Robin","last_name":"Howard","email":"rhoward7@wunderground.com","gender":"Female","ip_address":"248.144.19.8"},
    {"id":9,"first_name":"Matthew","last_name":"Myers","email":"mmyers8@cdc.gov","gender":"Male","ip_address":"8.67.177.45"},
    {"id":10,"first_name":"Stephen","last_name":"Thompson","email":"sthompson9@psu.edu","gender":"Male","ip_address":"53.133.174.167"},
    {"id":11,"first_name":"Marie","last_name":"Tucker","email":"mtuckera@amazon.co.jp","gender":"Female","ip_address":"25.255.166.191"},
    {"id":12,"first_name":"Keith","last_name":"Fox","email":"kfoxb@godaddy.com","gender":"Male","ip_address":"10.107.11.107"},
    {"id":13,"first_name":"Gerald","last_name":"Barnes","email":"gbarnesc@microsoft.com","gender":"Male","ip_address":"80.132.38.62"},
    {"id":14,"first_name":"Kathy","last_name":"Powell","email":"kpowelld@wordpress.org","gender":"Female","ip_address":"161.210.143.162"},
    {"id":15,"first_name":"Maria","last_name":"Garrett","email":"mgarrette@scribd.com","gender":"Female","ip_address":"234.134.223.226"},
    {"id":16,"first_name":"Brandon","last_name":"Carpenter","email":"bcarpenterf@biblegateway.com","gender":"Male","ip_address":"190.171.61.63"},
    {"id":17,"first_name":"John","last_name":"Wilson","email":"jwilsong@vinaora.com","gender":"Male","ip_address":"242.81.81.216"},
    {"id":18,"first_name":"Kathryn","last_name":"Walker","email":"kwalkerh@eepurl.com","gender":"Female","ip_address":"95.132.123.104"},
    {"id":19,"first_name":"Charles","last_name":"Fuller","email":"cfulleri@over-blog.com","gender":"Male","ip_address":"179.228.86.143"},
    {"id":20,"first_name":"Alan","last_name":"Williams","email":"awilliamsj@home.pl","gender":"Male","ip_address":"208.177.203.210"}
  ];
  /*
    function enablePagerButtons( page_no, max_rows){
    let buttons = $('.btn');
    $.each( buttons, function( ndx, ele){
      const blabel = ele.value;
      const n = parseInt( ele.value, 10);
      switch( blabel){
        case 'first_page':
          $(ele).attr( 'disabled', page_no === 1);
          break;
        case 'prev_page':
          $(ele).attr( 'disabled', page_no === 1);
          break;
        case 'next_page':
          $(ele).attr( 'disabled', page_no === Math.ceil(total_rows/max_rows));
          break;
        case 'last_page':
          $(ele).attr( 'disabled', page_no === Math.ceil( total_rows/max_rows));
          break;
        default:
          $(ele).attr( 'disabled', page_no === n);
          break;
      }
    });
  }

  */
</script>
</body>
</html>
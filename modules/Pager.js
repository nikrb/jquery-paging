/**
 * Pager.js
 * simple table paging with jquery.
 * usage: see readme
 * 
 **/
class Pager {
  constructor( max_rows_id, table_body_id, paging_div, getPageData){
    this.maxRowsClicked = this.maxRowsClicked.bind(this);
    this.changePage = this.changePage.bind(this);
    this.pageClicked = this.pageClicked.bind(this);
    this.max_rows = $('#'+max_rows_id);
    this.table_body = $('#'+table_body_id);
    this.paging = $('#'+paging_div);
    this.getPageData = getPageData;
    this.page_no = 1;
    this.total_rows = 0;
    this.max_rows.change( this.maxRowsClicked);
    this.changePage( 1);
  }
  maxRowsClicked( e){
    this.changePage( 1);
  }
  changePage( pageno){
    const that = this;
    this.page_no = pageno;
    const max_rows = parseInt( this.max_rows.val(), 10);
    this.getPageData( max_rows, (this.page_no-1)*max_rows, 
      function( payload){
        const rows = payload.data;
        that.total_rows = payload.total_rows;
        that.displayTable( rows);
        that.setPagerButtons();
      });
  }
  displayTable( rows){
    const that = this;
    this.table_body.empty();
    rows.forEach( function( row){
      let cols= "<tr>";
      row.forEach( function( column_value){
        cols += "<td>"+column_value+"</td>";
      });
      cols += "</tr>";
      that.table_body.append( $(cols));
    });
  }
  setPagerButtons(){
    const MAX_PAGE_BUTTONS = 5;
    const max_rows = parseInt( this.max_rows.val());
    const button_count = Math.ceil( this.total_rows/max_rows);
    let start_page = 1;
    let end_page = button_count;
    if( button_count > MAX_PAGE_BUTTONS-1){
      if( this.page_no -2 > 1){
        start_page = this.page_no -2;
      }
      end_page = start_page + MAX_PAGE_BUTTONS-1;
      if( end_page > button_count){
        end_page = button_count;
        start_page = end_page - MAX_PAGE_BUTTONS + 1;
        if( start_page < 1) start_page = 1;
      }
    }
    $('button').off();
    this.paging.empty();
    let dsbld = this.page_no === 1?"disabled":"";
    this.paging.append( "<button class='btn' id='first_page' value='first_page' "+dsbld+"><<</button>");
    this.paging.append( "<button class='btn' id='prev_page' value='prev_page' "+dsbld+"><</button>");
    for( let i=start_page; i <= end_page; i++){
      if( i === this.page_no){
        $('#paging_wrapper').append( "<button class='btn' id='btn"+i+"' value='"+i+"' disabled>"+i+"</button>");
      } else {
        $('#paging_wrapper').append( "<button class='btn' id='btn"+i+"' value='"+i+"'>"+i+"</button>");
      }
    }
    dsbld = ( this.page_no === Math.ceil( this.total_rows/max_rows))?"disabled":"";
    this.paging.append( "<button class='btn' value='next_page' "+dsbld+">></button>");
    this.paging.append( "<button class='btn' value='last_page' "+dsbld+">>></button>");
    $('button').on( 'click', this.pageClicked);
  }
  pageClicked( e){
    const btn = $(e.target).attr( 'value');
    switch( btn){
      case 'first_page':
        this.page_no = 1;
        break;
      case 'prev_page':
        this.page_no -= 1;
        break;
      case 'next_page':
        this.page_no += 1;
        break;
      case 'last_page':
        const max_rows = parseInt( this.max_rows.val(), 10);
        this.page_no = Math.ceil( this.total_rows/max_rows);
        break;
      default:
        const pn = parseInt( btn, 10);
        this.page_no = pn;
      break;
    }
    this.changePage( this.page_no);
  }

}


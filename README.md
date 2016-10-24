# jquery-paging
a simple table pager using jquery

usage
-----

* include jquery and Pager.js in source
* setup table with max rows droplist and paging divs
* create new pager 

```
new Pager( "max_rows_droplist", "table_body", "paging_wrapper", data_length, getPageData);
```

where:

* max_rows_droplist string id for max rows droplist
* table_body string id for table body
* paging_wrapper string id for pager div
* data_length total number of data rows
* getPageData provide a callback function to fetch the table data page at a time

```
function getPageData( display_rows, offset, total_rows, callback)
```

where:

* display_rows how many rows to display in table (from max_rows_droplist)
* offset mysql limit offset for first row of paged data required
* total_rows total number of table data rows
* callback( array_of_objects) pass data back to pager
    * array_of_object object with all col data for a row 

## Template

```
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
  <script>
    // init when doc ready
    pager = new Pager( "max_rows_droplist", "table_body", "paging_wrapper", data.length, getPageData);

    // provide getData
    function getPageData( display_rows, offset, total_rows, callback){
      // ...
      callback( array_of_data );
    }

  </script>
```


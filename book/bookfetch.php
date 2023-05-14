<style>
    .slider-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-left: 25px;
  
}

@media screen and (max-width: 768px) {
  .slider-wrapper {
    justify-content: center;
    margin-left: 0;
  }
}
@media screen and (min-width:1280px){
  .slider-wrapper{
    margin-left:35px;
    justify-content: center;
  }
}
@media only screen and (min-width:375px) and (max-width:480px) {
  .book-card {
      background-color: #fff;
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      flex-grow: 1;
      margin: 10px;
      max-width: calc((100vw / 3) + 20px) !important;
      padding: 20px;
    }
    .book-card img{
      width: 100%;
      height:calc((100vw / 3) + 20px) !important;
      object-fit: cover;
      
    }
    
}



    .book-card {
      background-color: #fff;
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      max-width: 250px;
      cursor: pointer;
      flex-grow: 1;
      margin: 10px;
      max-width: 200px;
      padding: 20px;
      
    }
    .book-card:hover {
      transform:translateY(-2px);
      box-shadow:1px 0px 2px 2px blue, -1px 1.3px 2px 2px blue, 0 0 10px 3px yellow;
}
    .book-card img{
      width: 100%;
      height: 250px;
      object-fit: cover;
      
    }
    .book-card h5 {
      margin: 1px;
    }
    @media only screen and (max-width:491px) and (max-height:896){
      .book-card {
      background-color: #fff;
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      max-width: 200px;
      cursor: pointer;
    font-size: 1rem;
    margin-top: auto;
    padding: 10px;
    }
}
    .book-card button {
  background-color: blue;
  padding-top:1px;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  font-size: 1rem;
  margin-top: auto;
  padding: 10px;
}

.book-card button:hover {
  background-color: darken(blue, 20%);
}

.add-basket-btn{
  background-color: #FFDF00;
  color:Dark !important;
}
.add-basket-btn:hover{
  background: linear-gradient(#FFDF00, #4CAF50);
  color:black !important;
}
</style>

<?php
$con = new mysqli("localhost", "root", "", "bookstore_project_books");

if ($con) {

  $val = 35;
  $page = isset($_POST['page']) ? $_POST['page'] : 1;
  $offset = ($page - 1) * $val;
  $sql = "SELECT * FROM books LIMIT $offset, $val";
  $r = $con->query($sql);
  $total = $r->num_rows;
  $totalpage = ceil($total / $val);

  $output = "<div class='slider-wrapper'>
                <div class='books-slider'>";

  if ($r->num_rows > 0) {

    while ($row = $r->fetch_assoc()) {

      $output .= '<div class="book-card mt-2 mb-2 ml-4 mr-3" id="bookcard">
      <div id="bookimg">
      <a href="../Bookdescription/book_description.php?id='.$row['id'].'"><img src="' . $row['image_filename'] . '" alt="Book Cover"></a>
      </div>
                    <h5>' . $row['title'] . '</h5>
                    <p id="price">₹'.$row['price'].'</p>
                    <a data-id="' .$row['id']. '" class="btn btn-primary add-basket-btn">Add to basket</a>
                  </div>';
    }

    $sql1 = "SELECT COUNT(*) as total FROM books";
    $result = $con->query($sql1);
    $row = $result->fetch_assoc();
    $total = $row['total'];
    $totalpage = ceil($total / $val);

    $output .= "<nav aria-label='Page navigation example' class='d-flex justify-content-center'>
                    <ul class='pagination justify-content-center'>
                      <li class='page-item'>";
    
    if ($page > 1) {
        $output .= "<a class='page-link prev-btn' data-id='".($page)."' value='" . ($page) . "' href='#' aria-label='Previous'>";
    } else {
        $output .= "<a class='page-link prev-btn' href='#' aria-label='Previous'>";
    }
    
    $output .= "<span aria-hidden='true'>&laquo;</span>
                </a>
              </li>";

    $max_displayed_pages = 6;
    $end_page = min($page + $max_displayed_pages - 1, $totalpage);

    for ($i = $page; $i <= $end_page; $i++) {
      $output .= "<li class='page-item' id='pagi'>
                    <a class='page-link' id='{$i}' value='{$i}' href='#'>{$i}</a>
                  </li>";
      $page += 1;
    }

    $output .= "<li class='page-item'>";
    $output .= "<a class='page-link next-btn' data-eid='" . $totalpage . "' data-id='" . ($page-1) . "' value='" . ($page) . "' href='' aria-label='Next'>";

    
    $output .= "<span aria-hidden='true'>&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>";

    $output .= "</div>
              </div>";

    echo $output;

    
  }else{
    echo '
      <div class="msgcon"><div class="msg3">
         0 results
        </div></div>';
  }
}else {
  echo '
      <div class="msgcon"><div class="msg3">
         0 results
        </div></div>';
}
$con->close();
?>

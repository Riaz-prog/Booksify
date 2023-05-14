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
      border:1px solid rgb(77, 1, 113);
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
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
@media only screen and (min-width:290px) and (max-width:559px){
  .error-msg1{
    max-width:100%; 
    height:550px;
  }
}
@media only screen and (min-width:560px){
  .error-msg1{
    max-width:100%; 
    height:670px;
  }
}
</style>
<?php
    $val = $_POST['val'];
    $con = new mysqli("localhost", "root", "", "bookstore_project_books");
    if ($con) {
        $val1 = 35;
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $offset = ($page - 1) * $val1;
        $val = strtolower($val);
        $search = explode(" ", $val);
        $arr = array();
        $arr[0]="Lower(title) LIKE '%{$val}%'
        OR Lower(author) LIKE '%{$val}%'
        OR Lower(description) LIKE '%{$val}%'
        OR Lower(ISBN) LIKE '%{$val}%'";
      foreach ($search as $t) {
          $arr[] = "(
            Lower(title) LIKE '%{$t}%'
              OR Lower(author) LIKE '%{$t}%'
              OR Lower(description) LIKE '%{$t}%'
              OR Lower(ISBN) LIKE '%{$t}%'
          )";
      }
    $arr_data = implode(" AND ", $arr);
    $sql = "SELECT * FROM books WHERE {$arr_data} LIMIT $offset, $val1";
        $r = $con->query($sql);
        if ($r) {
            $total = $r->num_rows;
        } else {
            echo "Error: " . $con->error;
        };
        $totalpage = ceil($total / $val1);

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

            $sql1 = "SELECT COUNT(*) as total FROM books WHERE title LIKE '%{$val}%' OR author LIKE '%{$val}%' ";
            $result = $con->query($sql1);
            $row = $result->fetch_assoc();
            $total = $row['total'];
            $totalpage = ceil($total / $val1);

            $output .= "<nav aria-label='Page navigation example' class='d-flex justify-content-center'>
                          <ul class='pagination justify-content-center'>
                            <li class='page-item'>";

            if ($page > 1) {
                $output .= "<a class='page-link prev-btn2' data-val='{$val}' data-id='" . ($page) . "' value='" . ($page - 1) . "' href='#' aria-label='Previous'>";
            } else {
                $output .= "<a class='page-link prev-btn2' data-val='{$val}' href='#' aria-label='Previous'>";
            }

            $output .= "<span aria-hidden='true'>&laquo;</span>
                      </a>
                    </li>";

            $max_displayed_pages = 6;
            $end_page = min($page + $max_displayed_pages - 1, $totalpage);

            for ($i = $page; $i <= $end_page; $i++) {
                $output .= "<li class='page-item' id='pagi2'>
                          <a class='page-link' id='{$i}' value='{$i}' data-val='{$val}' href='#'>{$i}</a>
                        </li>";
                $page += 1;
            }

            $output .= "<li class='page-item'>";
            $output .= "<a class='page-link next-btn2' data-val='{$val}' data-eid='" . $totalpage . "' data-id='" . ($page - 1) . "' value='" . ($page) . "' href='' aria-label='Next'>";


            $output .= "<span aria-hidden='true'>&raquo;</span>
                      </a
>
                      </li>
                    </ul>
                  </nav>";

            $output .= "</div>
                        </div>";

            echo $output;
        }else {
          echo "<div class='error-msg1'>
          <div class='msgcon'><div class='msg3'>
          <i class=\"fas fa-skull\" style=\"color: black;\"> 0 results
            </div></div></div>";
        }
        

        $con->close();
    }
?>
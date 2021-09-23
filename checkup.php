<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Costumers class
require_once BASE_PATH . '/lib/Costumers/checkup_order.php';
$costumers = new Costumers();

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination.
$pagelimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
	$filter_col = 'id';
}
if (!$order_by) {
	$order_by = 'Desc';
}

$customer_id = filter_input(INPUT_GET, 'patient_id', FILTER_SANITIZE_STRING);

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$db->where('patient_id',$customer_id);
$select = array('id', 'patient_id', 'check_up_date', 'cause', 'weight', 'bp', 'pulse', 'sugar', 'doctor_name', 'mobile', 'test', 'image');

//Start building query according to input parameters.
// If search string
if ($search_string) {
	$db->where('name', '%' . $search_string . '%', 'like');
	$db->orwhere('p_no', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by) {
	$db->orderBy($filter_col, $order_by);
}
//$db->where('patient_id = 4');

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query.
$rows = $db->arraybuilder()->paginate('checkup', $page, $select);
$total_pages = $db->totalPages;

if(isset($_GET['file_id'])){
    $imd = $_GET['file_id'];
  $filepath = 'images/' . $imd;
  
  ob_start();

if (file_exists($filepath) && is_readable($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('images/' . $imd));
    while (ob_get_level()) {
      ob_end_clean();
         }
          flush();
    readfile('images/' . $imd);

   
    exit;
}

  }

include BASE_PATH . '/includes/header.php';
?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Check up</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_checkup.php?patient_id=<?php echo $customer_id; ?>&operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php';?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_string" value="<?php echo xss_clean($search_string); ?>">
            <label for="input_order">Order By</label>
            <select name="filter_col" class="form-control">
                <?php
foreach ($costumers->setOrderingValues() as $opt_value => $opt_name):
	($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
	echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
endforeach;
?>
            </select>
            <select name="order_by" class="form-control" id="input_order">
                <option value="Asc" <?php
if ($order_by == 'Asc') {
	echo 'selected';
}
?> >Asc</option>
                <option value="Desc" <?php
if ($order_by == 'Desc') {
	echo 'selected';
}
?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">
        </form>
    </div>
    <hr>
    <!-- //Filters -->


    <div id="export-section">
        <a href="export_checkup.php"><button class="btn btn-sm btn-primary">Export to CSV <i class="glyphicon glyphicon-export"></i></button></a>
    </div>

    <!-- Table -->
    <table class="table table-striped table-bordered table-condensed" style="width:100%">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="10%">Patient ID</th>
                <th width="10%">Checkup Date</th>
                <th width="15%">Cause</th>
                <th width="10%">Weight</th>
                <th width="10%">Bp</th>
                <th width="10%">Pulse</th>
                <th width="10%">Sugar</th>
                <th width="5%">Doctor_name</th>
                <th width="8%">Mobile</th>
                <th width="8%">Test</th>
                <th width="8%">Report</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo xss_clean($row['patient_id']); ?></td>
                <td><?php echo xss_clean($row['check_up_date']); ?></td>
                <td><?php echo xss_clean($row['cause']); ?></td>
                <td><?php echo xss_clean($row['weight']); ?></td>
                <td><?php echo xss_clean($row['bp']); ?></td>
                <td><?php echo xss_clean($row['pulse']); ?></td>
                <td><?php echo xss_clean($row['sugar']); ?></td>
                <td><?php echo xss_clean($row['doctor_name']); ?></td>
                <td><?php echo xss_clean($row['mobile']); ?></td>
                <td><?php echo xss_clean($row['test']); ?></td>
                <td><a href="checkup.php?patient_id=<?php echo $row['patient_id']; ?>&operation=view&file_id=<?php echo $row['image']; ?>" class="btn btn-primary">Download</a></td>
                <!-- <td><?php echo xss_clean($row['image']); ?></td> -->
                
                <td>
                    <a href="edit_checkup.php?patient_id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $row['id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_checkup.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['id']; ?>">
                                <p>Are you sure you want to delete this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //Delete Confirmation Modal -->
            <?php endforeach;?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
    <?php echo paginationLinks($page, $total_pages, 'customers.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php';?>

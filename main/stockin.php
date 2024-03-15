<!DOCTYPE html>
<html>
<head>
    <title>Stock In</title>
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
    <form action="saveproduct.php" method="post" enctype="multipart/form-data">
        <hr>
        <div id="ac">
            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <div style="flex: 1;">
                    <span>Reference No:</span>
                    <input type="text" style="width:200px; height:25px;" name="code"><br>
                    <span>Stock in by:</span>
                    <input type="text" style="width:200px; height:25px;" name="name" Required/><br>
                    <span>Stock in date:</span>
                    <input type="date" style="width:200px; height:25px;" name="date_arrival" /><br>
                </div>
                <div style="flex: 1; margin-left: 20px;">
                    <span>Supplier:</span>
                    <select name="supplier" id="supplier" style="width:200px; height:25px;" onchange="fillSupplierDetails()">
                        <option></option>
                        <?php
                        include('../connect.php');
                        $result = $db->query("SELECT * FROM supliers");
                        $suppliers = $result->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($suppliers as $row) {
                        ?>
                            <option value="<?php echo $row['suplier_name']; ?>"><?php echo $row['suplier_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <span>Contact Person:</span>
                    <input type="text" style="width:200px; height:25px;" name="cperson" id="cperson" readonly/><br>
                    <span>Address:</span>
                    <input type="text" style="width:200px; height:25px;" name="address" id="address" readonly/><br>
                </div>
            </div>
            <a rel="facebox" href="productlist.php">
                        <button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;">
                            <i class="icon-plus-sign icon-large"></i> Click here to browse product
                        </button>
            </a>
            
        </div>
    </form>
    <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
        <thead>
            <tr>
                <th width="3%"> # </th>
                <th width="12%"> REFERENCE NO</th>
                <th width="14%"> PRODUCT CODE</th>
                <th width="13%"> DESCRIPTION</th>
                <th width="6%"> QTY </th>
                <th width="8%"> STOCK IN DATE </th>
                <th width="6%"> STOCK IN BY </th>
                <th width="6%"> SUPPLIER </th>
            </tr>
        </thead>
       
    </table>

    <script>
        
        function fillSupplierDetails() {
            var selectedSupplier = document.getElementById('supplier').value;
            var supplierDetails = <?php echo json_encode($suppliers); ?>;
            var selectedSupplierDetails = supplierDetails.find(function(supplier) {
                return supplier.suplier_name === selectedSupplier;
            });
            document.getElementById('cperson').value = selectedSupplierDetails ? selectedSupplierDetails.contact_person : '';
            document.getElementById('address').value = selectedSupplierDetails ? selectedSupplierDetails.suplier_address : '';
        }
       
    </script>
</body>
</html>

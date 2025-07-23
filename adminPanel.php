<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Application For Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container mt-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-500">Admin Panel For Billing</h1>

        <!--PROJECT MANAGEMENT SECTION-->
            <div class="ms-12 me-12 mb-1 p-4 bg-gray-500 rounded-lg shadow-sm" id="headDetails">
                <div id="adminDetails">
                    <?php
                        if(isset($_SESSION["uname"]))
                        {
                            echo("<div>");
                            echo("Welcome,");
                            echo("<br>");
                            echo("<br>");
                            echo("<h2 margin-left:'30px'>");
                                echo($_SESSION["uname"]);
                            echo("<br>");
                            echo($_SESSION["email"]);
                            echo("</h2>");
                            echo("</div>");
                        }
                    ?>
                    <div id=btnGroup>
                        <button type="button" name="createBill" class="btn outline p-1 me-2"><a href="http://127.0.0.1/myBillApp/billingApplication/adminPanel.php">Create Bill</a></button>
                        <button type="button" name="billList" class="btn outline p-1 me-2">Bill List</button>
                        <button type="submit" name="userLogout" class="btn bgdark outline p-1 me-2"><a href="logout.php">Logout</a></button>
                    </div>
                </div>
                <div id="custDetails">
                        <label for="cname">Custmer Name</label>
                        <input type="text" name="cname" id="cname"><br><br>

                        <label for="phone">Mobile No.</label>
                        <input type="text" name="phone" id="phone"><br><br>

                        <label for="custAddress">Billing Address</label>
                        <textarea name="custAddress" id="custAddress" rows="2" cols="30"></textarea>
                </div>
            </div>
            <div class="ms-12 me-12 p-6 bg-gray-500 rounded-lg shadow-sm" id="prodDetails">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Product Management</h2>
                <form method="get" action="index.html" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="productName" class="block text-md font-medium text-gray-700 mb-1">Product Name</label>
                        <input type="text" id="productName" name="txtProductName" placeholder="Enter Product Name" required>
                    </div>
                    <div>
                        <label for="productPrice" class="block text-md font-medium text-gray-700 mb-1">Price (INR)</label>
                        <input type="text" id="productPrice" name="textProductPrice" placeholder="Enter Product Price">
                    </div>
                    <div>
                        <label for="productQuantity" class="block text-md font-medium text-gray-700 mb-1" >Quantity</label>
                        <input type="text" id="productQuantity" name="txtProductQuantity" placeholder="Enter Quantity">
                    </div>
                    <div class="md:col-span-3">
                        <button type="button" name="addProduct" class="btn btn-primary md:w-auto">Add Product</button>
                    </div>
                </form>
                <h3 class="text-xl font-semibold mt-6 mb-3 text-gray-700">Available Products</h3>
                <div>
                    <table id="addedProductsTable">
                        <thead>
                            <tr>
                                <th>S. no</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Stock</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Soap</td>
                                <td>$115</td>
                                <td>0</td>
                                <td>2</td>
                                <td>$5</td>
                                <td>Edit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </main>
</body>
</html>
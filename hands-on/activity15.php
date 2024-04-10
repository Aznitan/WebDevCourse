
<html lang="en">
<head>
    <title>Acitvity 15 </title>
    <style>
        .error {
            color: #FF0000;
        }
        body,ol,li,ul, form, table {
            text-align: center;
            align-items: center;
        }
        table{
            margin: 0 auto;
        }

    </style>
</head>
<body>
    <h1>Welcome to Luis' Online Tech Store</h1>
    <p>Submited by Luis Fabela</p>
<hr>
    <form method="post"action="action15.php">
        <table width = "60%">
            <tr>
                <td>Item</td>
                <td>Price</td>
                <td>Want To Purchase?</td>
                <td>Quantity</td>
            </tr>
            <tr>
                <td><img src="https://www.digitalstorm.com/img/products/lumos/2020-overview-2-b.jpg" alt="Desktop PC" width ="100px">
                <input type="hidden" name="PCImage" value="https://www.digitalstorm.com/img/products/lumos/2020-overview-2-b.jpg">
                </td>
                <td>$499 <input type="hidden" name="PCPrice" value="499"></td>
                <td><input type="checkbox" name="PC" value="PC"></td>
                <td><input type="number" name="nPC" value="1"></td>
            </tr>
            <tr>
                <td><img src="https://cdn.mos.cms.futurecdn.net/mYqKAn6RCL65SSs2U3muiE.jpg" alt="Ipad" width ="110px">
                <input type="hidden" name="IpadImage" value="https://cdn.mos.cms.futurecdn.net/mYqKAn6RCL65SSs2U3muiE.jpg">
                </td>
                <td>$299 <input type="hidden" name="IpadPrice" value="299"></td>
                <td><input type="checkbox" name="Ipad" value="Ipad"></td>
                <td><input type="number" name="nIpad" value="1"></td>
            </tr>
            <tr>
                <td><img src="https://images.idgesg.net/images/article/2019/11/2017-5k-imac-100819096-large.jpg" alt="Mac" width ="100px">
                <input type="hidden" name="MacImage" value="https://images.idgesg.net/images/article/2019/11/2017-5k-imac-100819096-large.jpg">
                </td>
                <td>$1299 <input type="hidden" name="MacPrice" value="1299"></td>
                <td><input type="checkbox" name="Mac" value="Mac"></td>
                <td><input type="number" name="nMac" value="1"></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Add to shopping cart">
    </form>

    
</body>
</html>
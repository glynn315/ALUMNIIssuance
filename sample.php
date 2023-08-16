<!DOCTYPE html>
<html>
<head>
    <style>
        .id-card {
            width: 300px;
            height: 200px;
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        .photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px auto;
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="photo"></div>
        <h2>John Doe</h2>
        <p>ID: 123456</p>
    </div>
    <button id="print-button">Print ID Card</button>
<script>
    document.getElementById('print-button').addEventListener('click', function() {
        window.print();
    });
</script>

</body>
</html>

<!-- resources/views/word.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Word Form</title>

    <!-- Add any additional styles or meta tags here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        div {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            color: #333;
        }

        input {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div>
        <h2>PHP WORD Form</h2>

        <form method="post" action="{{ route('word.index') }}">
            @csrf
            <h3>Pihak Pertama</h3>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" required>

            <label for="produk">Produk:</label>
            <input type="text" id="produk" name="produk" required>

            <h3>Pihak Kedua</h3>
            <label for="nama2">Nama:</label>
            <input type="text" id="nama2" name="nama2" required>

            <label for="alamat2">Alamat:</label>
            <input type="text" id="alamat2" name="alamat2" required>

            <label for="jabatan2">Jabatan:</label>
            <input type="text" id="jabatan2" name="jabatan2" required>

            <!-- Add more input fields as needed -->

            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Add any additional content or scripts here -->
</body>

</html>

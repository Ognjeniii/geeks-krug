<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile picture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fake-btn {
            flex-shrink: 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .picture-msg {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        input {
            cursor: pointer;
        }

        .picture-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;
        }

        .picture-input:focus {
            outline: none;
        }

        button {
            z-index: 123123123;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>

<body data-bs-theme="dark">
    <div class="picture-drop-area">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_profile_picture.php" method="post" enctype="multipart/form-data">
            <span class="fake-btn">Choose picture</span>
            <span class="picture-msg">or drag and drop picture here</span>
            <input class="picture-input" type="file" accept="image/*" onchange="handleFileSelection(this)" name="picture_input">
            <button type="submit" class="btn btn-primary" id="uploadButton">Upload</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function displayFileName(input) {
            const pictureMsg = document.querySelector('.picture-msg');

            if (input.files.length === 0) {
                pictureMsg.innerText = "or drag and drop picture here";
            } else {
                const fileName = input.files[0].name;
                pictureMsg.innerText = "Selected file: " + fileName;
            }
        }

        function handleFileSelection(input) {
            const fileInput = document.querySelector('.picture-input');
            const pictureMsg = document.querySelector('.picture-msg');

            if (fileInput.files.length === 0) {
                pictureMsg.innerText = "or drag and drop picture here";
                return;
            }

            const selectedFile = fileInput.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

            if (allowedTypes.includes(selectedFile.type)) {
                displayFileName(fileInput);
            } else {
                alert("Please select a valid image file (JPEG, PNG, GIF, JPG).");
                fileInput.value = '';
            }
        }

        const fileInput = document.querySelector('.picture-input');
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 1) {
                alert("Please select only one picture at a time.");
                fileInput.value = '';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const uploadButton = document.getElementById('uploadButton');
            const iframeOverlay = parent.document.getElementById('iframeOverlay');

            uploadButton.addEventListener('click', function(event) {
                iframeOverlay.style.display = 'none';
            });
        });
    </script>

</body>

</html>
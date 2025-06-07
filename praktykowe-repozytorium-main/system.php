<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://css.gg/search.css' rel='stylesheet'>
    <script src="https://unpkg.com/showdown/dist/showdown.min.js"></script>
    <script src="showdown-table.js" defer></script>

    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.js"></script>
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.css" />
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/theme/toastui-editor-dark.css" />

    <link rel="stylesheet" href="style.css">
    <title>Edytor</title>

    <style>
    .save-btn {
        width: max-content !important;
        height: 0;
        padding: 0rem .5rem !important;
        background: red;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        background: #1986f8;
        color: #f7f9fc !important;
        font-weight: 500;
        outline: none;
        cursor: pointer;
        margin-left: auto !important;
        border-radius: 1px !important;
        border: none !important;
        transition: 0.4s ease;
    }

    .save-btn:hover {
        background: #0570df !important;
        color: #f7f9fc !important;
    }

    .save-btn:hover svg>path {
        fill: #f7f9fc !important;
    }

    .save-btn svg {
        margin-left: .6rem;
        width: 21px !important;
        height: 21px !important;
    }

    .save-btn svg>path {
        transition: 0.3s ease;
        fill: #f7f9fc !important;
    }

    .modal {
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 300000000;
        transition: 0.25s ease;
    }

    .modal-bg {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
    }

    .modal-inp-cont {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translateX(-50%);
        width: 35%;
        display: block;
    }

    .modal-inp {
        width: 100%;
        height: 100%;
        border: none;
        border-bottom: 2px solid white;
        color: white;
        outline: none;
        background: none;
        font-size: 1.7rem;
        font-family: "Inter";
        padding-bottom: 1rem;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.05);
    }

    .off {
        opacity: 0;
        z-index: -5000;
        visibility: hidden;
        pointer-events: none;
    }

    .contextmenu {
        width: 260px;
        height: max-content;
        background: #1e1f22;
        z-index: 300;
        position: absolute;
        box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.5);
        border-radius: 1px;
    }

    .contextmenu div {
        display: flex;
        align-items: center;
        padding: .9rem 1rem;
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.45);
        transition: 0.25s ease;
        cursor: pointer;
    }

    .contextmenu div svg {
        width: 24px;
        height: 24px;
        margin-right: 1.05rem;
    }

    .contextmenu div:not(:first-child) svg {
        margin-top: .2rem;
    }

    .contextmenu div svg path {
        fill: #ffffff80 !important;
        transition: 0.25s ease;
    }

    .contextmenu div:hover {
        color: white;
        background: #212226;
    }

    .contextmenu div:hover>svg path {
        fill: #ffffff !important;
    }

    .treeright{
        height: 100%;
    }
    </style>
</head>
<?php
// if username is not set, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<body>

    <div class="contextmenu off">
        <div class="context-add">
            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m11 11h-7.25c-.414 0-.75.336-.75.75s.336.75.75.75h7.25v7.25c0 .414.336.75.75.75s.75-.336.75-.75v-7.25h7.25c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-7.25v-7.25c0-.414-.336-.75-.75-.75s-.75.336-.75.75z"
                    fill-rule="nonzero" />
            </svg>
            Add file
        </div>
        <div class="context-delete">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                <path
                    d="M9 3h6v-1.75c0-.066-.026-.13-.073-.177-.047-.047-.111-.073-.177-.073h-5.5c-.066 0-.13.026-.177.073-.047.047-.073.111-.073.177v1.75zm11 1h-16v18c0 .552.448 1 1 1h14c.552 0 1-.448 1-1v-18zm-10 3.5c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm5 0c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm8-4.5v1h-2v18c0 1.105-.895 2-2 2h-14c-1.105 0-2-.895-2-2v-18h-2v-1h7v-2c0-.552.448-1 1-1h6c.552 0 1 .448 1 1v2h7z" />
            </svg>
            Delete
        </div>
        <div class="context-rename">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                <path
                    d="M8.071 21.586l-7.071 1.414 1.414-7.071 14.929-14.929 5.657 5.657-14.929 14.929zm-.493-.921l-4.243-4.243-1.06 5.303 5.303-1.06zm9.765-18.251l-13.3 13.301 4.242 4.242 13.301-13.3-4.243-4.243z" />
            </svg>
            Rename
        </div>
    </div>

    <form action="saveFile.php" method="post" class="saveFileForm">
        <input type="hidden" name="saveFileId" id="saveFileId">
        <input type="hidden" name="saveFileVal" id="saveFileVal">
    </form>

    <form action="addFile.php" method="post" class="add-file-form">
        <input type="hidden" name="lvl" class="addFileLvl">
        <input type="hidden" name="parentId" class="addFileParent">
        <input type="hidden" name="filename" class="addFileName">
        <input type="hidden" name="projectId" class="addFileProjectId">
    </form>

    <form action="deleteFile.php" method="post" class="deleteItemForm">
        <input type="hidden" class="deleteItemFormId" name="delid">
        <input type="hidden" class="deleteItemFormLvl" name="dellvl">
    </form>


    <header>
        <div class="header-logo">
            <div class="logo">
                <div class="a b"></div>
                <div class="a"></div>
                <div class="a c"></div>
            </div>
        </div>
        <div class="user">
            <a href="./index.php">
                <p>Login</p>
            </a>
            <a>
                <p><?php echo $_SESSION['username']; ?></p>
            </a>
        </div>
        <div class="search">
            <input type="text" name="inp_search" placeholder="Wyszukaj">
            <img src="./search.png" alt="search">
        </div>
    </header>
    <nav>
        <?php
        $h = "localhost";
        $u = "root";
        $p = "";
        $db = "praktyki";
        $conn = new mysqli($h, $u, $p, $db);
        //check connection
        if ($conn->connect_error) {
            echo ("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "SELECT project.name_Project, project.id_Project, project.user_Creator FROM `project` WHERE project.user_Creator = " . $_SESSION['u_id'];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul>";
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    echo "<li><button class='btn_project' data-projectid='" . $row['id_Project'] . "' onclick='checkClick(" . $i . ")'>" . $row["name_Project"] . "</button></li>";
                    $i++;
                }
                echo "</ul><input type='hidden' class='folder_num' name='folder_num' value='" . $i . "'>";
            } else {
                echo "Brak Projektów";
            }
        }
        ?>
    </nav>
    <div class="tree">
        <?php

        $sql1 = "SELECT id_Project FROM `Project` WHERE user_Creator = " . $_SESSION['u_id'];

        //show resoults sql 
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $i = 0;

            while ($row1 = $result1->fetch_assoc()) {
                $j = 0;
                $string = $row1['id_Project'];
                $string = str_replace(' ', '', $string);

                echo "<div class='" . $string . " treeright' data-projectId='".$row1['id_Project']."'><ul>";

                $sql2 = "SELECT file.name_file, file.id_File ,file.content, file.id_Parent, file.level, file.id_Project FROM file WHERE file.id_Project ='" . $row1["id_Project"] . "'";
                $result2 = $conn->query($sql2);

                while ($row2 = $result2->fetch_assoc()) {
                    $str = $row2['content'];
                    $str = str_replace(PHP_EOL, '|br|', $str);
                    $str = str_replace(" ", '|spc|', $str);

                    echo "<li onClick='idel(" . $row2["id_File"] . ")' class = 'id" . $row2["id_File"] . " color' name='" . $row2["level"] .   "'value='" . $str . "' data-fileid='" . $row2['id_File'] . "' data-projectId='" . $row2['id_Project'] . "'>" . $row2["name_file"];

                    echo "</li>";
                    $i++;
                    $j++;
                }

                echo "</ul><input type='hidden' class='num' name='num' value='" . $j . "'></div>";
            }
            echo "<input type='hidden' class='file_num' name='file_num' value='" . $i . "'>";
        } else {
            echo "Brak Plików";
        }
        ?>
    </div>
    <div class="content">
        <div id="editor"></div>
    </div>

    <script>
    const folder_num = document.getElementsByClassName("folder_num")[0].value;
    const file_num = document.getElementsByClassName("file_num")[0].value;
    const btn = document.getElementsByClassName("btn_project");
    const tree = document.getElementsByClassName("tree")[0];
    const id_file = document.getElementsByClassName("id_f")[0];
    const content = document.getElementsByClassName("content")[0];

    let currProject = -1;

    const Editor = toastui.Editor;
    const editor = new Editor({
        el: document.querySelector("#editor"),
        height: "100%",
        width: "100%",
        initialEditType: "markdown",
        previewStyle: "vertical",
        theme: "dark",
    });
    editor.getMarkdown();


    document.querySelectorAll('.btn_project').forEach(item => {

        item.addEventListener("click", e => {

            console.log(currProject)
            console.log(item.dataset.projectid)
            if (currProject == item.dataset.projectid) {
                tree.style.width = '10rem'
                content.style.marginLeft = `${tree.offsetWidth}px`;
                console.log("japierdole")
                currProject = -1;
                return
            }
            currProject = item.dataset.projectid;
            tree.style.display = "block";
            tree.style.width = "max-content";
            console.log(tree.offsetWidth)
            content.style.marginLeft = `${tree.offsetWidth}px`;
            console.log(content.style.marginLeft)
        })
    })

    function checkClick(x) {

        for (let j = 0; j < folder_num; j++) {
            let File = tree.children[j];
            File.style.display = "none";
        }

        let num = document.getElementsByClassName("num")[x].value;

        for (let i = 0; i < folder_num; i++) {
            if (btn[i] === btn[x]) {
                let File = tree.children[x];
                File.style.display = "block";

                for (let i = 0; i < num; i++) {
                    if (File.children[0].children[i].getAttribute("name") > 0) {
                        let sum = File.children[0].children[i].getAttribute("name") * 2;
                        File.children[0].children[i].style.marginLeft = sum + "rem";
                        File.children[0].children[i].style.borderLeft = " 1px solid #383a3f";
                    }
                }
            }
        }

        //Kolor Wybranego Elementu
        for (let i = 0; i < folder_num; i++) {
            let btnc = document.getElementsByClassName("btn_project")[i];
            btnc.style.backgroundColor = "#1e1f22";
        }

        let btnc = document.getElementsByClassName("btn_project")[x];
        btnc.style.backgroundColor = "#121212";
    }

    function idel(y) {
        x = "id";
        sum = x + y;
        let cons = document.getElementsByClassName(sum)[0].getAttribute("value");
        tempStr = cons;

        tempStr = tempStr.replace(/\|br\|/g, "<div></div>");
        tempStr = tempStr.replace(/\|spc\|/g, " ");
        document.querySelector(".ProseMirror").innerHTML = tempStr;

        setTimeout(() => {
            var nodes = document
                .querySelector(".ProseMirror")
                .getElementsByTagName("div");
            for (var i = 0; i < nodes.length; i++) {
                if (nodes[i].firstChild.nodeName == "BR") {
                    nodes[i].remove();
                }
            }
        }, 0);

        //Kolor Wybranego Elementu
        for (let i = 0; i < file_num; i++) {
            let color = document.getElementsByClassName("color")[i];
            color.style.backgroundColor = "#1e1f22";
        }
        let color = document.getElementsByClassName(sum)[0];
        color.style.backgroundColor = "#171717";
    }
    </script>

    <script>
    const tabCont = document.querySelector('.toastui-editor-defaultUI-toolbar')
    const saveBtn = document.createElement('button')
    saveBtn.setAttribute('class', 'save-btn')

    const svgs = `
        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.4166 2.875H16.2888V7.66667H13.4166V2.875ZM22.0416 3.83333V23H0.958313V0H18.2054L22.0416 3.83333ZM5.74998 8.625H17.25V1.91667H5.74998V8.625ZM19.1666 12.4583H3.83331V21.0833H19.1666V12.4583Z" fill="#fff"/>
        </svg>

        `
    saveBtn.innerHTML = `Save ${svgs}`
    tabCont.appendChild(saveBtn)


    const files = document.querySelectorAll('.color')
    const idInput = document.querySelector('#saveFileId')
    const valInput = document.querySelector('#saveFileVal')
    const saveFileForm = document.querySelector('.saveFileForm')
    const saveButton = document.querySelector('.save-btn')
    let currentFile;

    files.forEach(file => {
        file.addEventListener('click', e => {

            currentFile = e.currentTarget.dataset.fileid;
        })
    })

    saveButton.addEventListener('click', e => {
        idInput.value = currentFile;
        valInput.value = editor.getMarkdown()

        setTimeout(() => {
            saveFileForm.submit();
        }, 0)
    })
    </script>
    <?php

    $xd = $_SESSION['lastId'];
    echo "<script>
        const lis = document.querySelectorAll('.color')

        lis.forEach(l =>{
            if($xd == undefined) return;
            
            if(l.dataset.fileid == $xd){
                l.focus();
                idel($xd);
                currentFile = $xd;
            }
        })
    </script>;";
    ?>

    <div class="modal off">
        <form class="modal-inp-cont">
            <input type="text" class="modal-inp" placeholder="New file name">
        </form>
        <div class="modal-bg"></div>
    </div>




    <script>
    /* --- Context Menu --- */
    const add = document.querySelector('.add-file')
    const deletee = document.querySelector('.delete-file')
    const allLis = document.querySelectorAll('.color')
    const modalBg = document.querySelector('.modal-bg')
    const modal = document.querySelector('.modal')
    const modalForm = document.querySelector('.modal-inp-cont')
    const modalInp = document.querySelector('.modal-inp')
    const contextmenu = document.querySelector('.contextmenu')

    const addFileForm = document.querySelector('.add-file-form')
    const addFileLvl = document.querySelector('.addFileLvl')
    const addFileParent = document.querySelector('.addFileParent')
    const addFileProjectId = document.querySelector('.addFileProjectId')
    const addFileName = document.querySelector('.addFileName')

    const contextAdd = document.querySelector('.context-add')
    const contextDelete = document.querySelector('.context-delete')
    const contextRename = document.querySelector('.context-rename')


    // Variable holding info about last clicked li
    const newParent = {
        lvl: 0,
        id: 0,
        projectId: 0,
        name: ''
    }

    document.addEventListener('click', e => {
        if (!contextmenu.classList.contains('off')) {
            contextmenu.classList.add('off')
        }
    })

    // Event listener for context menu
    document.addEventListener('contextmenu', e => {
        if (e.target.classList.contains('color')) {
            e.preventDefault();

            contextmenu.style.left = e.x + 'px'
            contextmenu.style.top = e.y + 'px'
            contextmenu.classList.remove('off')

            newParent.lvl = parseInt(e.target.getAttribute('name')) + 1,
            newParent.id = e.target.dataset.fileid
            newParent.projectId = e.target.dataset.projectid
        } 
        else if(e.target.classList.contains('treeright')){
            e.preventDefault();

            contextmenu.style.left = e.x + 'px'
            contextmenu.style.top = e.y + 'px'
            contextmenu.classList.remove('off')

            newParent.lvl = 0
            newParent.id = -1
            newParent.projectId = e.target.dataset.projectid
        }
        else {
            e.preventDefault()
            contextmenu.classList.add('off')
        }
    })


    // Create file
    contextAdd.addEventListener('click', e => {
        modal.classList.remove('off')
    })

    modalForm.addEventListener('submit', e => {
        e.preventDefault()
        modal.classList.add('off')

        newParent.name = modalInp.value;

        addFileLvl.value = newParent.lvl;
        addFileParent.value = newParent.id;
        addFileName.value = newParent.name;
        addFileProjectId.value = newParent.projectId;

        addFileForm.submit()
    })

    // Delete file

    contextDelete.addEventListener('click', e => {
        const deleteItemForm = document.querySelector('.deleteItemForm')
        const deleteItemFormId = document.querySelector('.deleteItemFormId')
        const deleteItemFormLvl = document.querySelector('.deleteItemFormLvl')

        deleteItemFormId.value = newParent.id;
        deleteItemFormLvl.value = newParent.lvl;
        console.log(deleteItemFormId.value)
        console.log(deleteItemFormLvl.value)
        deleteItemForm.submit()
    })


    // Rename file


    // Modal
    modalBg.addEventListener('click', e => {
        modal.classList.add('off')
    })
    </script>
</body>

</html>
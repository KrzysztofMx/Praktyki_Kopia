const folder_num = document.getElementsByClassName("folder_num")[0].value;
const file_num = document.getElementsByClassName("file_num")[0].value;
const btn = document.getElementsByClassName("btn_project");
const tree = document.getElementsByClassName("tree")[0];
const id_file = document.getElementsByClassName("id_f")[0];
const content = document.getElementsByClassName("content")[0];

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

function checkClick(x) {
  tree.style.display = "block";
  tree.style.width = "20rem";
  content.style.marginLeft = "20rem";

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
        console.log(
          "File.children.children",
          File.children[0].children[i].getAttribute("name")
        );
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

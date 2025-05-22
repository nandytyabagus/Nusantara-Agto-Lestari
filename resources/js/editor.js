import Quill from "quill";
import "quill/dist/quill.snow.css";

const Size = Quill.import("formats/size");
Size.whitelist = ["small", false, "large", "huge"];
Quill.register(Size, true);

document.addEventListener("DOMContentLoaded", () => {
    const editorElement = document.getElementById("isi");
    if (!editorElement) return;

    editorElement.style.display = "none";

    const quillContainer = document.createElement("div");
    quillContainer.setAttribute("id", "quill-editor");
    quillContainer.style.height = "8.5rem";
    editorElement.parentNode.insertBefore(
        quillContainer,
        editorElement.nextSibling
    );

    const quill = new Quill("#quill-editor", {
        theme: "snow",
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                [{ size: ["small", false, "large", "huge"] }],
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["link", "image"],
                ["clean"],
            ],
        },
    });

    const oldContent = editorElement.value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    const form = document.querySelector("#form-artikel");
    form.addEventListener("submit", () => {
        editorElement.value = quill.root.innerHTML;
    });
});

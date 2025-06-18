import Quill from "quill";
import "quill/dist/quill.snow.css";

const Size = Quill.import("formats/size");
Size.whitelist = ["small", false, "large", "huge"];
Quill.register(Size, true);

document.addEventListener("DOMContentLoaded", () => {
    const quillEditor = document.getElementById("quill-editor");
    const quillEditorArea = document.getElementById("quill-editor-area");

    if (quillEditor && quillEditorArea) {
        quillEditor.style.height = "25rem";

        const editor = new Quill("#quill-editor", {
            theme: "snow",
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    [{ size: ["small", false, "large", "huge"] }],
                    ["bold", "italic", "underline", "strike"],
                    [{ list: "ordered" }, { list: "bullet" }],
                    [{ indent: "-1" }, { indent: "+1" }],
                    [{ color: [] }, { background: [] }],
                    [{ align: [] }],
                    ["link", "image"],
                    ["clean"],
                ],
            },
        });

        editor.on("text-change", () => {
            quillEditorArea.value = editor.root.innerHTML;
        });

        if (quillEditorArea.value.trim() !== "") {
            editor.clipboard.dangerouslyPasteHTML(quillEditorArea.value);
        }
    }
});

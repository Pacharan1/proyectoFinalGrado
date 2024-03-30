document.addEventListener("DOMContentLoaded", function () {
  const dropArea = document.querySelector(".drag-area");
  const dragText = dropArea.querySelector("h2");
  const btnsubida = document.querySelector(".btnsubida");
  const input = dropArea.querySelector("#input-file");
  let files;

  btnsubida.addEventListener("click", (e) => {
    input.click();
  });

  input.addEventListener("change", (e) => {
    file = input.files;
    dropArea.classList.add("active");
    showFiles(file);
    dropArea.classList.remove("active");
  });

  dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
    dragText.textContent = "Suelta para subir archivos";
  });
  dropArea.addEventListener("dragleave", (e) => {
    e.preventDefault();
    dropArea.classList.remove("active");
    dragText.textContent = "Arrastra y suelta para subir";
  });
  dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    files = e.dataTransfer.files;
    showFiles(files);
    dropArea.classList.remove("active");
    dragText.textContent = "Arrastra y suelta para subir";
  });

  function showFiles(files) {
    if (files.length === undefined) {
      processFile(files);
    } else {
      for (let file of files) {
        processFile(file);
      }
    }
  }

  function processFile(file) {
    const docType = file.type;
    const validarExtension = [
      "image/jpeg",
      "image/jpg",
      "image/png",
      "image/gif",
    ];

    if (validarExtension.includes(docType)) {
      //subir archivo
      const reader = new FileReader();
      const id = `file-${Math.random().toString(32).substring(7)}`;

      reader.addEventListener("load", (e) => {
        const fileUrl = reader.result;
        const image = `
        <div id="${id}" class="file-container">
          <img src="${fileUrl}" alt="${file.name}" width="30">
            <div class="status">
                <span>${file.name}</span>
                <span class="status-text">
                    Loading...
                </span>
            </div>
        </div>`;

        const html = document.querySelector("#preview").innerHTML;
        document.querySelector("#preview").innerHTML = html + image;
      });

      reader.readAsDataURL(file);
      uploadFile(file, id);
    } else {
      console.log("Archivo no permitido");
    }
  }

  async function uploadFile(file, id) {
    const formData = new FormData();
    formData.append("file", file);

    try {
      const response = await fetch("http://localhost:3000/upload", {
        method: "POST",
        body: formData,
      });

      const responseText = await response.text();
      console.log(responseText);
      document.querySelector(
        `#${id} .status-text`
      ).innerHTML = `<span class="exito">File uploaded successfully!</span>`;
    } catch (error) {
      document.querySelector(
        `#${id} .status-text`
      ).innerHTML = `<span class="fail-upload">File uploaded failed...</span>`;
    }
  }
});

const $d = document;
const $main = $d.querySelector("main");
const $dropZone = $d.querySelector(".dropZone");

const uploader = (archivo) => {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append("file", archivo);
    xhr.addEventListener("readystatechange", e => {
        if(xhr.readyState === 4) { 

        if(xhr.status >= 200 && xhr.status < 300){
            let json = JSON.parse(xhr.responseText);
        }else{
            let mensaje = xhr.statusText || "Ocurrió un error";
            console.log(`Error ${xhr.status}: ${mensaje}`);
        }

    }
    });
    xhr.open("POST", "php/uploader.php");
    xhr.setRequestHeader("enc-type", "multipart/form-data");
    xhr.send(formData);
}

$dropZone.addEventListener("dragover", e => {
    e.preventDefault();
    e.stopPropagation();
    e.target.classList.add("is-active");    
})

$dropZone.addEventListener("dragleave", e => {
    e.preventDefault();
    e.stopPropagation();
    e.target.classList.remove("is-active");    
})

$dropZone.addEventListener("drop", e =>{
    e.preventDefault();
    e.stopPropagation();
    const files = Array.from(e.dataTransfer.files);
    files.forEach(el => progressUpload(el))
    e.target.classList.remove("is-active");    

})

const progressUpload = (archivo) => {
    const $progress = $d.createElement("progress");
    const $span = $d.createElement("span");
    $progress.value = 0;
    $progress.max = 100;

    $main.insertAdjacentElement("beforeend", $progress);
    $main.insertAdjacentElement("beforeend", $span);

    const fileReader = new FileReader();
    fileReader.readAsDataURL(archivo);

    fileReader.addEventListener("progress", e => {
        let progress = parseInt((e.loaded * 100) / e.total);
        $progress.value = progress;
        $span.innerHTML = `${archivo.name} - ${progress}%`;
    });

    fileReader.addEventListener("loadend", e =>{
        uploader(archivo);
        setTimeout(() => {
            $main.removeChild($progress);
            $main.removeChild($span);
        }, 1000);
    });
}
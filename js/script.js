// Función para obtener el valor de una cookie
const getCookie = (nombre) => {
    const cookies = document.cookie.split(';');
    for (let cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split('=');
        if (cookieName.trim() === nombre) {
            return cookieValue;
        }
    }
    return null;
}

// Función para establecer una cookie con el valor dado
const setCookie = (nombre, valor, dias) => {
    const date = new Date();
    date.setTime(date.getTime() + (dias * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = nombre + "=" + valor + ";" + expires + ";path=/";
}

// Acceder al DOM
const $d = document;
const $main = $d.querySelector("main");
const $dropZone = $d.querySelector(".dropZone");

const IMAGENES_MAX = 3; // Número máximo de imágenes permitidas

// Función para cargar archivos usando AJAX
const uploader = (archivo) => {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append("file", archivo);
    xhr.addEventListener("readystatechange", e => {
        if (xhr.readyState !== 4) return;

        if (xhr.status >= 200 && xhr.status < 300) {
            let json = JSON.parse(xhr.responseText);
        } else {
            let mensaje = xhr.statusText || "Ocurrió un error";
            console.log(`Error ${xhr.status}: ${mensaje}`);
        }
    });
    xhr.open("POST", "php/uploader.php");
    xhr.setRequestHeader("enc-type", "multipart/form-data");
    xhr.send(formData);
}
//Funciones Drag & Drop
$dropZone.addEventListener("dragover", e => {
    e.preventDefault();
    e.stopPropagation();
    e.target.classList.add("is-active");
});

$dropZone.addEventListener("dragleave", e => {
    e.preventDefault();
    e.stopPropagation();
    e.target.classList.remove("is-active");
});

$dropZone.addEventListener("drop", e => {
    e.preventDefault();
    e.stopPropagation();
    // Files contiene las imágenes
    const imagenes = Array.from(e.dataTransfer.files);
    const imagenesCargadas = parseInt(getCookie("imagenesCargadas")) || 0;
    imagenes.forEach(img => {
        progressUpload(img);
        uploader(img); //enviar la imagen al servidor para la evaluacion
    })


    // Establecer la cookie con el nuevo valor
    if (imagenes.length + imagenesCargadas <= IMAGENES_MAX) {
        imagenes.forEach(img => progressUpload(img));
        e.target.classList.remove("is-active");
        setCookie("imagenesCargadas", imagenesCargadas + imagenes.length, 1); 
    } else {
        alert("Regístrate para poder cargar más imágenes");
        e.target.classList.remove("is-active");
    }
});

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

    fileReader.addEventListener("loadend", e => {
        uploader(archivo);
        setTimeout(() => {
            $main.removeChild($progress);
            $main.removeChild($span);
        }, 1000);
    });
}

const id = window.dispositivoId;
const especie = window.nombrePlanta.toLowerCase(); // Convertimos a minúsculas para hacer match

const rangosPorEspecie = {
  "aloe vera": {
    ph: [
      { max: 5.5, icono: "🧪", mensaje: "suelo algo ácido. Considera intervenir." },
      { max: 7.5, icono: "🌱", mensaje: "rango ideal para su crecimiento." },
      { max: Infinity, icono: "🧂", mensaje: "suelo alcalino. Considera usar materia orgánica." }
    ],
    humedad: [
      { max: 2450, icono: "🌊", mensaje: "muy húmedo. Puede provocar problemas." },
      { max: 3270, icono: "🌿", mensaje: "nivel adecuado para el crecimiento." },
      { max: Infinity, icono: "💧", mensaje: "muy seco. Considera regar tu planta." }
    ],
    temperatura: [
      { max: 20, icono: "❄️", mensaje: "fría. Puede dañar la planta." },
      { max: 38, icono: "☀️", mensaje: "óptima para el desarrollo de la planta" },
      { max: Infinity, icono: "🔥", mensaje: "muy alta. Evita exposición prolongada." }
    ]
  },
  "sansevieria": {
    ph: [
      { max: 5.5, icono: "🧪", mensaje: "ácido. Prefiere un suelo más neutral." },
      { max: 7.5, icono: "🌱", mensaje: "rango ideal para sansevieria." },
      { max: Infinity, icono: "🧂", mensaje: "alcalino. Agrega compost para mejorar." }
    ],
    humedad: [
      { max: 2450, icono: "🌊", mensaje: "exceso de humedad. Puede provocar problemas." },
      { max: 3270, icono: "🌿", mensaje: "humedad adecuada." },
      { max: Infinity, icono: "💧", mensaje: "baja humedad. Considera regar tu planta." }
    ],
    temperatura: [
      { max: 18, icono: "❄️", mensaje: "demasiado frío. Puede causar daños" },
      { max: 27, icono: "☀️", mensaje: "temperatura ideal." },
      { max: Infinity, icono: "🔥", mensaje: "muy caliente. Evita la exposición prolongada" }
    ]
  },
  "cóleo": {
    ph: [
      { max: 5.5, icono: "🧪", mensaje: "suelo ácido. Considera intervenir para suelo más neutro." },
      { max: 7.5, icono: "🌱", mensaje: "ideal para coleo." },
      { max: Infinity, icono: "🧂", mensaje: "suelo alcalino. Considera añadir materia orgánica." }
    ],
    humedad: [
      { max: 1630, icono: "🌊", mensaje: "exceso de humedad. Puede provocar problemas." },
      { max: 2450, icono: "🌿", mensaje: "humedad óptima para coleo." },
      { max: Infinity, icono: "💧", mensaje: "muy seco. Considera regar tu planta." }
    ],
    temperatura: [
      { max: 20, icono: "❄️", mensaje: "baja temperatura. Puede causar daños." },
      { max: 38, icono: "☀️", mensaje: "rango ideal para coleo." },
      { max: Infinity, icono: "🔥", mensaje: "calor excesivo. Evita la exposición prolongada." }
    ]
  },
  "corona de cristo": {
    ph: [
      { max: 5.5, icono: "🧪", mensaje: "demasiado ácido. Considera intervenir para suelo más neutro." },
      { max: 7.0, icono: "🌱", mensaje: "ph ideal para Corona de Cristo." },
      { max: Infinity, icono: "🧂", mensaje: "alcalino. Considera añadir materia orgánica." }
    ],
    humedad: [
      { max: 2450, icono: "🌊", mensaje: "muy húmedo. Puede provocar problemas." },
      { max: 3270, icono: "🌿", mensaje: "adecuado para esta planta." },
      { max: Infinity, icono: "💧", mensaje: "muy seco. Considera regar tu planta" }
    ],
    temperatura: [
      { max: 16, icono: "❄️", mensaje: "demasiado frío. Puede causar daños" },
      { max: 33, icono: "☀️", mensaje: "temperatura ideal." },
      { max: Infinity, icono: "🔥", mensaje: "demasiado calor. Evita la exposición prolongada." }
    ]
  },
    "crotón de jardin": {
    ph: [
      { max: 5.5, icono: "🧪", mensaje: "demasiado ácido. Considera intervenir para suelo más neutro." },
      { max: 7.0, icono: "🌱", mensaje: "ph ideal para Corona de Cristo." },
      { max: Infinity, icono: "🧂", mensaje: "alcalino. Considera añadir materia orgánica." }
    ],
    humedad: [
      { max: 1630, icono: "🌊", mensaje: "muy húmedo. Puede provocar problemas." },
      { max: 2450, icono: "🌿", mensaje: "adecuado para esta planta." },
      { max: Infinity, icono: "💧", mensaje: "muy seco. Considera regar tu planta" }
    ],
    temperatura: [
      { max: 20, icono: "❄️", mensaje: "demasiado frío. Puede causar daños" },
      { max: 41, icono: "☀️", mensaje: "temperatura ideal." },
      { max: Infinity, icono: "🔥", mensaje: "demasiado calor. Evita la exposición prolongada." }
    ]
  }
};

function obtenerYActualizarPromedios() {
  fetch(`/dispositivos/${id}/promedios/`)
    .then(response => response.json())
    .then(data => {
      const rangos = rangosPorEspecie[especie] || rangosPorEspecie["aloe vera"];

      actualizarTexto("ph-explicacion", "PH del suelo", data.phsuelo, rangos.ph, data.ultima_phsuelo);
      actualizarTexto("humedad-explicacion", "Humedad del suelo", data.humedad, rangos.humedad, data.ultima_humedad);
      actualizarTexto("temperatura-explicacion", "Temperatura", data.temperatura, rangos.temperatura, data.ultima_temperatura);
      actualizarLuminosidad("luminosidad-explicacion", "Luminosidad", data.ultima_luminosidad);
    })
    .catch(error => {
      console.error("Error al obtener promedios:", error);
    });
}

function actualizarTexto(idElemento, titulo, promedio, mensajes, ultimoValor) {
  const contenedor = document.getElementById(idElemento);
  const mensajeInfo = mensajes.find(m => promedio <= m.max);
  const icono = mensajeInfo?.icono || "⚠️";
  const mensaje = mensajeInfo?.mensaje || "No se pudo determinar el estado.";

  contenedor.innerHTML = `
    <div class="info-container">
      <div class="info-promedio">${icono} ${promedio}</div>
      <div class="info-mensaje">
        <strong>${titulo}</strong><br>
        ${mensaje}<br>
        <small>Último valor: ${ultimoValor}</small>
      </div>
    </div>
  `;
}

function actualizarLuminosidad(idElemento, titulo, ultimoValor) {
  const contenedor = document.getElementById(idElemento);
  let mensaje, icono;

  if (ultimoValor == 0) {
    icono = "🌑";
    mensaje = "La planta no está recibiendo luz directa.";
  } else if (ultimoValor == 100) {
    icono = "☀️";
    mensaje = "La planta tiene acceso a luz solar.";
  } else {
    icono = "🔆";
    mensaje = "Nivel de luz intermedio.";
  }

  contenedor.innerHTML = `
    <div class="info-container">
      <div class="info-promedio">${icono} ${ultimoValor}</div>
      <div class="info-mensaje">
        <strong>${titulo}</strong><br>
        ${mensaje}<br>
        <small>Último valor: ${ultimoValor}</small>
      </div>
    </div>
  `;
}

document.addEventListener("DOMContentLoaded", () => {
  obtenerYActualizarPromedios();
  setInterval(obtenerYActualizarPromedios, 5000);
});

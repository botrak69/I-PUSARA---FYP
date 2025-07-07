@extends('Frontend.layout')

@section('title', 'Carian dan Lokasi Pusara')

@section('content')
<div class="container my-5">
  <div class="row g-4">

    <!-- Panel Carian -->
    <div class="col-lg-4">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h5>Carian</h5>
        </div>
        <div class="card-body">
          <p class="small text-muted mb-2">
            Isi salah satu butiran carian sahaja.<br>Tarikh dalam format MM/DD/YYYY
          </p>
          <div class="mb-3">
            <label class="form-label">Nama Si Mati</label>
            <input type="text" id="name" class="form-control" placeholder="Contoh: Ahmad">
          </div>
          <div class="mb-3">
            <label class="form-label">No Lot</label>
            <input type="text" id="lot" class="form-control" placeholder="Contoh: A01">
          </div>
          <div class="mb-3">
            <label class="form-label">Tarikh Mati</label>
            <input type="date" id="date" class="form-control">
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" onclick="search()">Cari</button>
            <button class="btn btn-outline-secondary" onclick="resetForm()">Reset</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Panel Hasil dan Peta -->
    <div class="col-lg-8">
      <div class="card shadow mb-3">
        <div class="card-header bg-success text-white">
          <h5>Hasil Carian</h5>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead class="table-light">
              <tr>
                <th>No Lot</th>
                <th>Nama</th>
                <th>Tarikh Mati</th>
                <th>Lokasi</th>
              </tr>
            </thead>
            <tbody id="resultTable"></tbody>
          </table>
        </div>
      </div>
      <div id="map" class="rounded shadow" style="height: 500px;"></div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
const map = L.map('map', {
  crs: L.CRS.Simple,
  minZoom: -2
});

const bounds = [[-2241, 0], [0, 3509]];
L.imageOverlay('{{ asset('picture/cemetery_layout.jpg') }}', bounds).addTo(map);
map.fitBounds(bounds);

let markerGroup = L.layerGroup().addTo(map);
let plotLayer;
let highlightPlot;
let geoData = [];

// Load GeoJSON
fetch('{{ asset('kubur/kubur.geojson') }}')
  .then(res => res.json())
  .then(data => {
    geoData = data.features;
    plotLayer = L.geoJSON(data, {
      style: {
        color: 'green',
        weight: 1,
        fillOpacity: 0.2
      },
      onEachFeature: function (feature, layer) {
        const plot = feature.properties.plotid ?? '-';
        const name = feature.properties.name ?? '-';
        const date = feature.properties.date ?? '-';

        layer.on('click', () => {
          const centroid = getCentroid(feature.geometry.coordinates);
          locate(centroid[0], centroid[1], name, plot, date);
        });
      }
    }).addTo(map);

    // ✅ Auto run search from URL if exists
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('search');
    if (searchQuery) {
      document.getElementById('name').value = searchQuery;
      setTimeout(() => {
        search();
      }, 500);
    }
  });

// Search Function
function search() {
  const name = document.getElementById('name').value.toLowerCase();
  const lot = document.getElementById('lot').value.toLowerCase();
  const inputDate = document.getElementById('date').value;

  let formattedDate = '';
  if (inputDate) {
    const parts = inputDate.split('-');
    formattedDate = `${parts[1]}/${parts[2]}/${parts[0]}`;
  }

  const filtered = geoData.filter(f =>
    (!name || (f.properties.name && f.properties.name.toLowerCase().includes(name))) &&
    (!lot || (f.properties.plotid && f.properties.plotid.toLowerCase().includes(lot))) &&
    (!formattedDate || (f.properties.date && f.properties.date === formattedDate))
  );

  displayResults(filtered);
  plotMarkers(filtered);
}

// Display Results in Table
function displayResults(data) {
  const table = document.getElementById('resultTable');
  table.innerHTML = '';
  if (data.length === 0) {
    table.innerHTML = `<tr><td colspan="4" class="text-center">Tiada rekod dijumpai</td></tr>`;
    return;
  }

  data.forEach(f => {
    const plot = f.properties.plotid ?? '-';
    const name = f.properties.name ?? '-';
    const date = f.properties.date ?? '-';
    const centroid = getCentroid(f.geometry.coordinates);
    const x = centroid[0];
    const y = centroid[1];

    table.innerHTML += `
      <tr>
        <td>${plot}</td>
        <td>${name}</td>
        <td>${date}</td>
        <td>
          <button class="btn btn-sm btn-success" onclick="locate(${x}, ${y}, '${name}', '${plot}', '${date}')">📍</button>
        </td>
      </tr>
    `;
  });
}

// Plot Markers
function plotMarkers(data) {
  markerGroup.clearLayers();
  data.forEach(f => {
    const centroid = getCentroid(f.geometry.coordinates);
    const x = centroid[0];
    const y = centroid[1];
    const plot = f.properties.plotid ?? '-';
    const name = f.properties.name ?? '-';
    const date = f.properties.date ?? '-';

    const marker = L.marker([y, x])
      .bindPopup(`<b>${name}</b><br>Lot: ${plot}<br>Tarikh Mati: ${date}`);
    markerGroup.addLayer(marker);
  });
}

// Locate and Highlight
function locate(x, y, name, plot, date) {
  map.flyTo([y, x], 0);

  if (highlightPlot) {
    map.removeLayer(highlightPlot);
  }

  highlightPlot = L.circleMarker([y, x], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 10
  }).addTo(map).bindPopup(`<b>${name}</b><br>Lot: ${plot}<br>Tarikh Mati: ${date}`).openPopup();

  if (plotLayer) {
    plotLayer.eachLayer(layer => {
      if (layer.feature.properties.plotid &&
          layer.feature.properties.plotid.toLowerCase() === plot.toLowerCase()) {
        layer.setStyle({ color: 'red', weight: 3, fillOpacity: 0.3 });
      } else {
        layer.setStyle({ color: 'green', weight: 1, fillOpacity: 0.2 });
      }
    });
  }
}

// Reset Form and Map
function resetForm() {
  document.getElementById('name').value = '';
  document.getElementById('lot').value = '';
  document.getElementById('date').value = '';

  if (plotLayer) {
    plotLayer.eachLayer(l => l.setStyle({ color: 'green', weight: 1, fillOpacity: 0.2 }));
  }

  markerGroup.clearLayers();

  if (highlightPlot) {
    map.removeLayer(highlightPlot);
    highlightPlot = null;
  }

  displayResults([]);
}

// Get Centroid of Polygon
function getCentroid(coords) {
  const poly = coords[0][0];
  const x = (poly[0][0] + poly[2][0]) / 2;
  const y = (poly[0][1] + poly[2][1]) / 2;
  return [x, y];
}
</script>
@endsection

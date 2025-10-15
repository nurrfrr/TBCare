@extends('layout')

@section('title', 'MonitorTBC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!--
  MonitorTBC page
  - Simulasi login ada di pojok untuk testing
  - Form manual dan AI dialog sebagai modal
  - Chart.js digunakan untuk menampilkan grafik dari data manual
-->

<div class="container my-5">

  <!-- SIMULATE LOGIN (testing only) -->
  <div class="d-flex justify-content-end mb-3">
    <div class="me-2 align-self-center text-muted small">Mode demo:</div>
    <button id="btnToggleLogin" class="btn btn-outline-success btn-sm">Simulate Login</button>
  </div>

  <!-- ====== 1. INFO CONTAINER (dark green rounded) ====== -->
  <div class="info-container p-4 rounded-4 mb-4 d-flex flex-column flex-md-row align-items-center">
    <div class="me-md-4 flex-fill">
      <h2 class="display-6 fw-bold text-white">Kenapa Penting Memantau Kondisi TBC?</h2>
      <p class="text-white-80">
        Monitoring kondisi membantu deteksi dini kondisi yang memburuk dan memastikan pengobatan berjalan sesuai rencana.
        Di sini Anda bisa memasukkan data gejala secara manual atau meminta pemeriksaan singkat berbasis AI (demo).
        Data yang tersimpan (harus login) dapat ditampilkan dalam dashboard grafik untuk memantau perkembangan.
      </p>
      <p class="mb-0 text-white-80"><strong>Catatan:</strong> Untuk menyimpan riwayat dan analisis yang sinkron, harap login.</p>
    </div>

    <div class="ms-md-4 text-center img-wrap">
      <!-- Ganti asset gambar sesuai file di public/images/... -->
      <img src="{{ asset('images/belajarTBC/tbc-monitor-illustration.png') }}" alt="monitor" class="img-fluid rounded-3 shadow-sm" style="max-width:320px;">
    </div>
  </div>

  <!-- ====== 2. JUMBOTRON CHOICE MODE ====== -->
  <div class="card p-3 mb-4 belajar-card">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h3 class="fw-bold mb-1">Pilih Mode Pemeriksaan</h3>
        <p class="text-muted mb-0">Pilih "Cek Manual" untuk isi form terstruktur (disimpan & dianalisis) atau "Cek AI" untuk menceritakan gejala Anda secara bebas.</p>
      </div>
      <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#manualModal">Cek Manual</button>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#aiModal">Cek AI</button>
      </div>
    </div>
  </div>

  <!-- ====== 3. RIWAYAT KONDISI ====== -->
  <div class="card belajar-card mb-4 p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="mb-0">Riwayat Kondisi</h5>
      <small id="histCount" class="text-muted">0 laporan</small>
    </div>

    <div id="historyArea">
      <div class="text-center text-muted py-4">Belum ada riwayat. Silakan lakukan <strong>Cek Manual</strong> (login diperlukan untuk menyimpan).</div>
    </div>
  </div>

  <!-- ====== 4. DASHBOARD ANALISIS (CHART) ====== -->
  <div class="card belajar-card mb-4 p-3">
    <h5 class="mb-3">Dashboard Analisis</h5>

    <div id="chartContainer">
      <canvas id="monitorChart" height="120"></canvas>
    </div>

    <div id="needLoginAlert" class="mt-3">
      <div class="alert alert-warning">
        Untuk melihat analisis yang tersimpan dan sinkron, Anda harus <strong>login</strong> dan mengisi minimal 1 laporan manual.
      </div>
    </div>
  </div>

  <!-- ====== 5. REKOMENDASI ====== -->
  <div id="recommendation" class="card belajar-card p-3 mb-5" style="display:none;">
    <h5 class="mb-2">Rekomendasi</h5>
    <div id="recContent" class="text-muted">
      <!-- diisi via JS -->
    </div>
  </div>

</div>

<!-- ===================== MODAL: Manual Form ===================== -->
<div class="modal fade" id="manualModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Cek Manual - Isi Data Kondisi</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="manualForm">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Intensitas Batuk</label>
            <select name="cough" class="form-select" required>
              <option value="">Pilih</option>
              <option value="0">Tidak ada</option>
              <option value="1">Ringan (jarang)</option>
              <option value="2">Sedang (sering)</option>
              <option value="3">Berat (terus-menerus)</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Suhu Tubuh (°C)</label>
              <input type="number" step="0.1" name="temp" class="form-control" placeholder="36.6" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Berat Badan (kg)</label>
              <input type="number" step="0.1" name="weight" class="form-control" placeholder="70.0" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Nafsu Makan</label>
            <select name="appetite" class="form-select" required>
              <option value="">Pilih</option>
              <option value="2">Normal</option>
              <option value="1">Berkurang</option>
              <option value="0">Sangat berkurang</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Sedang Minum Obat (OAT)?</label>
            <select name="on_med" class="form-select" required>
              <option value="">Pilih</option>
              <option value="no">Tidak</option>
              <option value="yes">Ya</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Keterangan Tambahan</label>
            <textarea name="note" rows="3" class="form-control" placeholder="Opsional: ceritakan gejala yang tidak tercapture"></textarea>
          </div>

          <div class="alert alert-info small">
            Data ini nantinya akan dipakai untuk analisis pada dashboard. <strong>Login diperlukan</strong> untuk menyimpan riwayat.
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan & Analisis</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ===================== MODAL: AI CHECK (textarea) ===================== -->
<div class="modal fade" id="aiModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Cek AI - Ceritakan Gejala Anda</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="aiForm">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Cerita singkat gejala (misal: batuk 2 minggu, demam malam...)</label>
            <textarea name="ai_input" rows="5" class="form-control" placeholder="Tulis gejala di sini..." required></textarea>
          </div>

          <div class="alert alert-warning small">
            Hasil AI bersifat saran — bukan diagnosa medis. Untuk kepastian, konsultasikan ke tenaga medis.
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-outline-success">Minta Analisis AI (demo)</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Inline JS: client-side demo logic (store in localStorage for demo) -->
<script>
/*
  Demo behaviour:
  - Simulate login with a toggle button
  - Manual form submission requires login to save
  - Data saved to localStorage 'monitor_reports' as array
  - Chart is updated from saved data when logged-in, otherwise shows placeholder
*/

const LS_KEY = 'monitor_reports_v1';
let isLoggedIn = false; // simulate login flag

document.addEventListener('DOMContentLoaded', () => {
  // simulate login toggle
  const btnLogin = document.getElementById('btnToggleLogin');
  btnLogin.addEventListener('click', () => {
    isLoggedIn = !isLoggedIn;
    btnLogin.textContent = isLoggedIn ? 'Simulate Logout' : 'Simulate Login';
    btnLogin.classList.toggle('btn-success', !isLoggedIn);
    btnLogin.classList.toggle('btn-outline-success', isLoggedIn);
    updateUIAfterAuth();
  });

  // init chart
  initChart();

  // load history if any
  renderHistory();

  // manual form submit
  document.getElementById('manualForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const form = e.target;
    const data = {
      id: Date.now(),
      date: form.date.value,
      cough: Number(form.cough.value),
      temp: Number(form.temp.value),
      weight: Number(form.weight.value),
      appetite: Number(form.appetite.value),
      on_med: form.on_med.value,
      note: form.note.value || ''
    };

    if (!isLoggedIn) {
      // not allowed to save / analyze
      alert('Silakan login terlebih dahulu (gunakan tombol "Simulate Login") untuk menyimpan dan melihat analisis.');
      return;
    }

    // save to localStorage
    const reports = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
    reports.push(data);
    localStorage.setItem(LS_KEY, JSON.stringify(reports));

    // close modal
    const modalEl = document.getElementById('manualModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();

    // update UI
    renderHistory();
    updateChartFromReports();
    showRecommendationForLatest(data);
  });

  // AI form demo: just shows a fake AI response (no API call)
  document.getElementById('aiForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const text = e.target.ai_input.value.trim();
    if (!text) return;
    // simple heuristic: if contains 'batuk' + '2 minggu' -> warning
    let message = 'Hasil analisis AI (demo): ';
    if (/batuk/i.test(text) && /2 minggu|dua minggu|2minggu/i.test(text)) {
      message += 'Gejala batuk lama terdeteksi. Disarankan segera periksa ke fasilitas kesehatan.';
    } else if (/demam/i.test(text) || /sakit/i.test(text)) {
      message += 'Beberapa gejala umum terdeteksi. Pantau dan bila memburuk, hubungi tenaga medis.';
    } else {
      message += 'Pertanyaan dipahami, tetapi disarankan detail lebih lengkap untuk analisis lebih tepat.';
    }

    // show result
    alert(message);
    const modalEl = document.getElementById('aiModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();
  });

}); // DOMContentLoaded

// ---------------- Chart setup ----------------
let monitorChart = null;
function initChart() {
  const ctx = document.getElementById('monitorChart').getContext('2d');
  monitorChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [], // dates
      datasets: [
        {
          label: 'Intensitas Batuk',
          data: [],
          borderColor: '#276B44',
          backgroundColor: 'rgba(39,107,68,0.12)',
          tension: 0.3,
          fill: true
        },
        {
          label: 'Suhu (°C)',
          data: [],
          borderColor: '#89C27B',
          backgroundColor: 'rgba(137,194,123,0.12)',
          tension: 0.3,
          fill: true
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'top' },
        tooltip: { mode: 'index', intersect: false }
      },
      interaction: { mode: 'nearest', axis: 'x', intersect: false },
      scales: {
        x: { title: { display: true, text: 'Tanggal' } },
        y: { beginAtZero: true }
      }
    }
  });

  updateChartFromReports(); // try to load existing if logged in
}

// -------------- History & Chart helpers --------------
function getReports() {
  return JSON.parse(localStorage.getItem(LS_KEY) || '[]');
}

function renderHistory() {
  const container = document.getElementById('historyArea');
  const reports = getReports();
  if (!reports.length) {
    container.innerHTML = '<div class="text-center text-muted py-4">Belum ada riwayat. Silakan lakukan <strong>Cek Manual</strong> (login diperlukan untuk menyimpan).</div>';
    document.getElementById('histCount').textContent = '0 laporan';
    return;
  }

  document.getElementById('histCount').textContent = reports.length + ' laporan';

  // build table
  let html = `<div class="table-responsive"><table class="table table-sm">
    <thead><tr>
      <th>Tanggal</th><th>Batuk</th><th>Suhu</th><th>Berat</th><th>Obat</th><th>Catatan</th>
    </tr></thead><tbody>`;
  reports.slice().reverse().forEach(r => {
    html += `<tr>
      <td>${r.date}</td>
      <td>${['Tidak','Ringan','Sedang','Berat'][r.cough] || r.cough}</td>
      <td>${r.temp} °C</td>
      <td>${r.weight} kg</td>
      <td>${r.on_med === 'yes' ? 'Ya' : 'Tidak'}</td>
      <td>${(r.note || '')}</td>
    </tr>`;
  });
  html += '</tbody></table></div>';
  container.innerHTML = html;
}

function updateChartFromReports() {
  const reports = getReports();
  if (!reports.length || !isLoggedIn) {
    // no saved data or not logged in -> show placeholder & alert
    monitorChart.data.labels = [];
    monitorChart.data.datasets.forEach(ds => ds.data = []);
    monitorChart.update();
    document.getElementById('needLoginAlert').style.display = 'block';
    document.getElementById('recommendation').style.display = 'none';
    return;
  }

  // sort by date asc
  const sorted = reports.slice().sort((a,b)=> new Date(a.date) - new Date(b.date));
  monitorChart.data.labels = sorted.map(r => r.date);
  monitorChart.data.datasets[0].data = sorted.map(r => r.cough);
  monitorChart.data.datasets[1].data = sorted.map(r => r.temp);
  monitorChart.update();

  document.getElementById('needLoginAlert').style.display = 'none';
  // show recommendation for latest
  showRecommendationForLatest(sorted[sorted.length-1]);
}

function showRecommendationForLatest(r) {
  if(!r) return;
  document.getElementById('recommendation').style.display = 'block';
  const rec = document.getElementById('recContent');
  // basic rule-based recs
  let messages = [];
  if (r.cough >= 2 || r.temp >= 38) {
    messages.push('Terlihat adanya gejala yang perlu diwaspadai (batuk sering atau demam tinggi). Segera konsultasikan ke fasilitas kesehatan terdekat.');
  } else {
    messages.push('Gejala relatif ringan. Pertahankan pemantauan, istirahat cukup, dan jika memburuk segera periksa.');
  }
  if (r.on_med === 'yes') messages.push('Anda sedang dalam pengobatan. Pastikan minum obat sesuai jadwal dan kontrol ke fasilitas kesehatan.');
  if (r.appetite <= 1) messages.push('Perhatikan asupan gizi — konsumsi makanan bergizi dan berkonsultasi ke petugas bila perlu.');

  rec.innerHTML = messages.map(m => `<div class="mb-2">• ${m}</div>`).join('');
}

// update UI after login toggle
function updateUIAfterAuth() {
  // if logged in, show saved data in chart & history
  if (isLoggedIn) {
    updateChartFromReports();
  } else {
    // hide chart data, but still render history from localstorage (read-only)
    renderHistory();
    monitorChart.data.labels = [];
    monitorChart.data.datasets.forEach(ds => ds.data = []);
    monitorChart.update();
    document.getElementById('needLoginAlert').style.display = 'block';
    document.getElementById('recommendation').style.display = 'none';
  }
}
</script>

@endsection


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game | TopZone</title>
    <link rel="stylesheet" href="{{ asset('css/topup.css') }}">
</head>
<body>

<div class="page">
    <div class="topup-card">

        <a href="{{ route('home') }}" class="back-link">
            ← Kembali ke beranda
        </a>

        <div class="heading">
            <h1>Top Up Game</h1>
            <p>Pilih game dan nominal favoritmu.</p>
        </div>

        <form id="topupForm">

            <label for="game">Pilih Game<span>*</span></label>
            <select id="game" name="game" required>
                <option value="">Pilih game</option>
                <option value="Free Fire">Free Fire</option>
                <option value="Mobile Legends">Mobile Legends</option>
                <option value="PUBG Mobile">PUBG Mobile</option>
            </select>

            <label for="player_id">ID Pemain<span>*</span></label>
            <input
                type="text"
                id="player_id"
                name="player_id"
                placeholder="Masukkan ID pemain"
                required
            >

            <div id="serverGroup" class="hidden">
                <label for="server_id">Server ID</label>
                <input
                    type="text"
                    id="server_id"
                    name="server_id"
                    placeholder="Masukkan server ID"
                >
            </div>

            <label>Pilih Nominal<span>*</span></label>

            <div class="nominal-grid" id="nominalGrid">

                <button type="button" class="nominal-item"
                    data-amount="100" data-price="15000">
                    <strong>100 Diamond</strong>
                    <span>Rp15.000</span>
                </button>

                <button type="button" class="nominal-item"
                    data-amount="250" data-price="35000">
                    <strong>250 Diamond</strong>
                    <span>Rp35.000</span>
                </button>

                <button type="button" class="nominal-item"
                    data-amount="500" data-price="70000">
                    <strong>500 Diamond</strong>
                    <span>Rp70.000</span>
                </button>

                <button type="button" class="nominal-item"
                    data-amount="1000" data-price="140000">
                    <strong>1000 Diamond</strong>
                    <span>Rp140.000</span>
                </button>

            </div>

            <input type="hidden" id="jumlah" name="jumlah">
            <input type="hidden" id="harga" name="harga">

            <label for="wallet">Metode Pembayaran<span>*</span></label>
            <select id="wallet" name="wallet" required>
                <option value="">Pilih e-wallet</option>
                <option value="DANA">DANA</option>
                <option value="OVO">OVO</option>
                <option value="GoPay">GoPay</option>
                <option value="ShopeePay">ShopeePay</option>
            </select>

            <div class="summary">
                <span>Total Pembayaran</span>
                <strong id="total">Rp0</strong>
            </div>

            <button type="submit" class="submit-btn">
                Lanjutkan Top Up →
            </button>

            <p class="secure-note">
                Pastikan ID pemain dan nominal sudah benar.
            </p>

        </form>
    </div>
</div>

<script>
    const game = document.getElementById('game');
    const serverGroup = document.getElementById('serverGroup');
    const nominalItems = document.querySelectorAll('.nominal-item');
    const jumlah = document.getElementById('jumlah');
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');
    const form = document.getElementById('topupForm');

    let selectedPrice = 0;

    function formatRupiah(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(value);
    }

    game.addEventListener('change', () => {
        const needsServer = game.value === 'Mobile Legends';

        serverGroup.classList.toggle('hidden', !needsServer);
        document.getElementById('server_id').required = needsServer;

        // Reset nominal saat game berubah
        nominalItems.forEach(item => item.classList.remove('selected'));
        jumlah.value = '';
        harga.value = '';
        selectedPrice = 0;
        total.textContent = formatRupiah(0);

        nominalItems.forEach(item => {
            const amount = Number(item.dataset.amount);

            item.querySelector('strong').textContent =
                game.value === 'PUBG Mobile'
                    ? `${amount} UC`
                    : `${amount} Diamond`;
        });
    });

    nominalItems.forEach(item => {
        item.addEventListener('click', () => {
            if (!game.value) {
                alert('Pilih game terlebih dahulu.');
                game.focus();
                return;
            }

            nominalItems.forEach(button =>
                button.classList.remove('selected')
            );

            item.classList.add('selected');

            jumlah.value = item.dataset.amount;
            harga.value = item.dataset.price;
            selectedPrice = Number(item.dataset.price);

            total.textContent = formatRupiah(selectedPrice);
        });
    });

    form.addEventListener('submit', event => {
        event.preventDefault();

        if (!jumlah.value) {
            alert('Silakan pilih nominal top up.');
            return;
        }

        alert(
            'Form berhasil diperiksa!\n' +
            'Game: ' + game.value + '\n' +
            'ID Pemain: ' + document.getElementById('player_id').value +
            '\nTotal: ' + formatRupiah(selectedPrice) +
            '\nPembayaran: ' + document.getElementById('wallet').value +
            '\n\nIni masih demo. Transaksi belum disimpan.'
        );
    });
</script>

</body>
</html>

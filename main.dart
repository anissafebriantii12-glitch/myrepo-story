import 'package:flutter/material.dart';

void main() {
  runApp(const SimarApp());
}

class SimarApp extends StatelessWidget {
  const SimarApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'SIMAR DISKOMINFO',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(
          seedColor: const Color(0xFF0D47A1),
        ),
        useMaterial3: true,
      ),
      home: const LoginScreen(),
    );
  }
}

// ==================== HALAMAN LOGIN ====================
class LoginScreen extends StatefulWidget {
  const LoginScreen({super.key});

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final TextEditingController _usernameController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  bool _isPasswordVisible = false;

  void _handleLogin() {
    String inputUser = _usernameController.text.trim();
    if (inputUser.isNotEmpty && _passwordController.text.isNotEmpty) {
      Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (context) => MainHomeScreen(loggedInUser: inputUser),
        ),
      );
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(
          content: Text('Harap isi NIP/Username dan Password!'),
          backgroundColor: Colors.red,
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFF5F7FA),
      body: Center(
        child: SingleChildScrollView(
          padding: const EdgeInsets.all(24.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Container(
                padding: const EdgeInsets.all(16),
                decoration: const BoxDecoration(
                  color: Color(0xFF0D47A1),
                  shape: BoxShape.circle,
                ),
                child: const Icon(
                  Icons.meeting_room_rounded,
                  size: 50,
                  color: Colors.white,
                ),
              ),
              const SizedBox(height: 16),
              const Text(
                'SIMAR DISKOMINFO',
                style: TextStyle(
                  fontSize: 22,
                  fontWeight: FontWeight.bold,
                  color: Color(0xFF0D47A1),
                ),
              ),
              const Text(
                'Sistem Informasi Manajemen Agenda Ruang',
                style: TextStyle(fontSize: 12, color: Colors.grey),
                textAlign: TextAlign.center,
              ),
              const SizedBox(height: 32),
              TextField(
                controller: _usernameController,
                decoration: InputDecoration(
                  labelText: 'NIP / Username',
                  prefixIcon: const Icon(Icons.person),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(12),
                  ),
                ),
              ),
              const SizedBox(height: 16),
              TextField(
                controller: _passwordController,
                obscureText: !_isPasswordVisible,
                decoration: InputDecoration(
                  labelText: 'Password',
                  prefixIcon: const Icon(Icons.lock),
                  suffixIcon: IconButton(
                    icon: Icon(
                      _isPasswordVisible
                          ? Icons.visibility
                          : Icons.visibility_off,
                    ),
                    onPressed: () {
                      setState(() {
                        _isPasswordVisible = !_isPasswordVisible;
                      });
                    },
                  ),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(12),
                  ),
                ),
              ),
              const SizedBox(height: 24),
              SizedBox(
                width: double.infinity,
                height: 50,
                child: ElevatedButton(
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xFF0D47A1),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(12),
                    ),
                  ),
                  onPressed: _handleLogin,
                  child: const Text(
                    'MASUK / LOGIN',
                    style: TextStyle(
                      color: Colors.white,
                      fontSize: 16,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

// ==================== HALAMAN UTAMA (BERANDA) ====================
class MainHomeScreen extends StatefulWidget {
  final String loggedInUser;
  const MainHomeScreen({super.key, required this.loggedInUser});

  @override
  State<MainHomeScreen> createState() => _MainHomeScreenState();
}

class _MainHomeScreenState extends State<MainHomeScreen> {
  int _selectedIndex = 0;

  final List<Map<String, String>> _agendas = [
    {
      'judul': 'Rapat Koordinasi Infrastruktur Jaringan',
      'ruangan': 'Utama',
      'namaRuangan': 'Ruang Rapat Utama (Lt. 2)',
      'waktu': '09:00 - 11:30 WIB',
      'jamMulai': '09:00',
      'jamSelesai': '11:30',
      'tanggal': '14/10/2026',
      'status': 'Berlangsung',
      'pimpinan': 'Kepala Dinas Diskominfo',
    },
    {
      'judul': 'Sosialisasi Keamanan Informasi & Cyber Security',
      'ruangan': 'Vicon',
      'namaRuangan': 'Ruang Video Conference',
      'waktu': '13:00 - 15:00 WIB',
      'jamMulai': '13:00',
      'jamSelesai': '15:00',
      'tanggal': '14/10/2026',
      'status': 'Mendatang',
      'pimpinan': 'Kabid E-Government',
    },
    {
      'judul': 'Evaluasi Integrasi Layanan Publik SIMAR',
      'ruangan': 'Diskusi1',
      'namaRuangan': 'Ruang Rapat Diskusi 1',
      'waktu': '09:00 - 12:00 WIB',
      'jamMulai': '09:00',
      'jamSelesai': '12:00',
      'tanggal': '15/10/2026',
      'status': 'Mendatang',
      'pimpinan': 'Tim Pengembang IT',
    },
  ];

  final List<Map<String, String>> _ruanganList = [
    {
      'nama': 'Ruang Rapat Utama (Lt. 2)',
      'kapasitas': '50 Orang',
      'status': 'Terpakai'
    },
    {
      'nama': 'Ruang Video Conference',
      'kapasitas': '25 Orang',
      'status': 'Tersedia'
    },
    {
      'nama': 'Ruang Rapat Diskusi 1',
      'kapasitas': '15 Orang',
      'status': 'Tersedia'
    },
    {
      'nama': 'Ruang Rapat Diskusi 2',
      'kapasitas': '15 Orang',
      'status': 'Tersedia'
    },
    {'nama': 'Ruang VIP Tamu', 'kapasitas': '10 Orang', 'status': 'Tersedia'},
  ];

  void _showDaftarRuangan(BuildContext context) {
    showModalBottomSheet(
      context: context,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(20)),
      ),
      builder: (context) {
        return Padding(
          padding: const EdgeInsets.all(20.0),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Center(
                child: Container(
                  width: 40,
                  height: 4,
                  decoration: BoxDecoration(
                    color: Colors.grey.shade300,
                    borderRadius: BorderRadius.circular(10),
                  ),
                ),
              ),
              const SizedBox(height: 16),
              const Text(
                'Daftar Ruangan Rapat Diskominfo',
                style: TextStyle(
                  fontSize: 18,
                  fontWeight: FontWeight.bold,
                  color: Color(0xFF0D47A1),
                ),
              ),
              const SizedBox(height: 12),
              Flexible(
                child: ListView.builder(
                  shrinkWrap: true,
                  itemCount: _ruanganList.length,
                  itemBuilder: (context, index) {
                    final item = _ruanganList[index];
                    final isUsed = item['status'] == 'Terpakai';
                    return ListTile(
                      contentPadding: EdgeInsets.zero,
                      leading: const CircleAvatar(
                        backgroundColor: Color(0xFFE3F2FD),
                        child:
                            Icon(Icons.meeting_room, color: Color(0xFF0D47A1)),
                      ),
                      title: Text(item['nama']!,
                          style: const TextStyle(fontWeight: FontWeight.bold)),
                      subtitle: Text('Kapasitas: ${item['kapasitas']}'),
                      trailing: Container(
                        padding: const EdgeInsets.symmetric(
                            horizontal: 10, vertical: 4),
                        decoration: BoxDecoration(
                          color: isUsed
                              ? Colors.red.shade50
                              : Colors.green.shade50,
                          borderRadius: BorderRadius.circular(12),
                        ),
                        child: Text(
                          item['status']!,
                          style: TextStyle(
                            color: isUsed ? Colors.red : Colors.green,
                            fontWeight: FontWeight.bold,
                            fontSize: 12,
                          ),
                        ),
                      ),
                    );
                  },
                ),
              ),
            ],
          ),
        );
      },
    );
  }

  void _showRapatHariIni(BuildContext context) {
    final rapatHariIni =
        _agendas.where((a) => a['tanggal'] == '14/10/2026').toList();

    showModalBottomSheet(
      context: context,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(20)),
      ),
      builder: (context) {
        return Padding(
          padding: const EdgeInsets.all(20.0),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Center(
                child: Container(
                  width: 40,
                  height: 4,
                  decoration: BoxDecoration(
                    color: Colors.grey.shade300,
                    borderRadius: BorderRadius.circular(10),
                  ),
                ),
              ),
              const SizedBox(height: 16),
              const Text(
                'Agenda Rapat Hari Ini',
                style: TextStyle(
                  fontSize: 18,
                  fontWeight: FontWeight.bold,
                  color: Color(0xFF0D47A1),
                ),
              ),
              const SizedBox(height: 12),
              Flexible(
                child: ListView.builder(
                  shrinkWrap: true,
                  itemCount: rapatHariIni.length,
                  itemBuilder: (context, index) {
                    final item = rapatHariIni[index];
                    return ListTile(
                      contentPadding: EdgeInsets.zero,
                      leading: const CircleAvatar(
                        backgroundColor: Color(0xFFFFF3E0),
                        child:
                            Icon(Icons.event_available, color: Colors.orange),
                      ),
                      title: Text(item['judul']!,
                          style: const TextStyle(fontWeight: FontWeight.bold)),
                      subtitle:
                          Text('${item['namaRuangan']} • ${item['waktu']}'),
                    );
                  },
                ),
              ),
            ],
          ),
        );
      },
    );
  }

  void _showFormPinjamRuang(BuildContext context) {
    DateTime selectedDate = DateTime.now();
    String? selectedRuangan = 'Utama';
    TextEditingController judulController = TextEditingController();
    TextEditingController pimpinanController = TextEditingController();
    TextEditingController dateController = TextEditingController(
      text: "${selectedDate.day}/${selectedDate.month}/${selectedDate.year}",
    );
    TextEditingController jamMulaiController =
        TextEditingController(text: "09:00");
    TextEditingController jamSelesaiController =
        TextEditingController(text: "11:00");

    bool isBentrok = false;
    String pesanBentrok = "";

    showModalBottomSheet(
      context: context,
      isScrollControlled: true,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(20)),
      ),
      builder: (context) {
        return StatefulBuilder(
          builder: (BuildContext context, StateSetter setModalState) {
            void checkCollision() {
              isBentrok = false;
              pesanBentrok = "";

              final jamMulai = jamMulaiController.text;
              final tglInput = dateController.text;

              if (selectedRuangan == 'Utama' &&
                  tglInput == '14/10/2026' &&
                  (jamMulai == '09:00' || jamMulai == '10:00')) {
                isBentrok = true;
                pesanBentrok =
                    "Jadwal Bentrok! Ruang Rapat Utama sudah dibooking jam 09:00 - 11:30 WIB pada tanggal tersebut.";
              }
            }

            checkCollision();

            return Padding(
              padding: EdgeInsets.only(
                bottom: MediaQuery.of(context).viewInsets.bottom,
                left: 20,
                right: 20,
                top: 20,
              ),
              child: SingleChildScrollView(
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Center(
                      child: Container(
                        width: 40,
                        height: 4,
                        decoration: BoxDecoration(
                          color: Colors.grey.shade300,
                          borderRadius: BorderRadius.circular(10),
                        ),
                      ),
                    ),
                    const SizedBox(height: 16),
                    const Text(
                      'Form Peminjaman Ruang Rapat',
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.bold,
                        color: Color(0xFF0D47A1),
                      ),
                    ),
                    const SizedBox(height: 16),
                    TextField(
                      controller: judulController,
                      decoration: InputDecoration(
                        labelText: 'Nama / Judul Kegiatan Rapat',
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                        prefixIcon: const Icon(Icons.title),
                      ),
                    ),
                    const SizedBox(height: 12),
                    DropdownButtonFormField<String>(
                      value: selectedRuangan,
                      decoration: InputDecoration(
                        labelText: 'Pilih Ruangan',
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                        prefixIcon: const Icon(Icons.meeting_room),
                      ),
                      items: const [
                        DropdownMenuItem(
                            value: 'Utama',
                            child: Text('Ruang Rapat Utama (Lt. 2)')),
                        DropdownMenuItem(
                            value: 'Vicon',
                            child: Text('Ruang Video Conference')),
                        DropdownMenuItem(
                            value: 'Diskusi1', child: Text('Ruang Diskusi 1')),
                      ],
                      onChanged: (value) {
                        setModalState(() {
                          selectedRuangan = value;
                          checkCollision();
                        });
                      },
                    ),
                    const SizedBox(height: 12),
                    TextField(
                      controller: dateController,
                      readOnly: true,
                      decoration: InputDecoration(
                        labelText: 'Tanggal Peminjaman',
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                        prefixIcon: const Icon(Icons.calendar_today,
                            color: Color(0xFF0D47A1)),
                      ),
                      onTap: () async {
                        DateTime? pickedDate = await showDatePicker(
                          context: context,
                          initialDate: selectedDate,
                          firstDate: DateTime.now(),
                          lastDate: DateTime(2030),
                          builder: (context, child) {
                            return Theme(
                              data: Theme.of(context).copyWith(
                                colorScheme: const ColorScheme.light(
                                  primary: Color(0xFF0D47A1),
                                  onPrimary: Colors.white,
                                  onSurface: Colors.black,
                                ),
                              ),
                              child: child!,
                            );
                          },
                        );
                        if (pickedDate != null) {
                          setModalState(() {
                            selectedDate = pickedDate;
                            dateController.text =
                                "${pickedDate.day}/${pickedDate.month}/${pickedDate.year}";
                            checkCollision();
                          });
                        }
                      },
                    ),
                    const SizedBox(height: 12),
                    Row(
                      children: [
                        Expanded(
                          child: TextField(
                            controller: jamMulaiController,
                            decoration: InputDecoration(
                              labelText: 'Jam Mulai',
                              hintText: '09:00',
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              prefixIcon: const Icon(Icons.access_time),
                            ),
                            onChanged: (v) =>
                                setModalState(() => checkCollision()),
                          ),
                        ),
                        const SizedBox(width: 10),
                        Expanded(
                          child: TextField(
                            controller: jamSelesaiController,
                            decoration: InputDecoration(
                              labelText: 'Jam Selesai',
                              hintText: '11:00',
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              prefixIcon: const Icon(Icons.access_time_filled),
                            ),
                            onChanged: (v) =>
                                setModalState(() => checkCollision()),
                          ),
                        ),
                      ],
                    ),
                    if (isBentrok) ...[
                      const SizedBox(height: 12),
                      Container(
                        padding: const EdgeInsets.all(12),
                        decoration: BoxDecoration(
                          color: Colors.red.shade50,
                          borderRadius: BorderRadius.circular(10),
                          border: Border.all(color: Colors.red.shade300),
                        ),
                        child: Row(
                          children: [
                            const Icon(Icons.warning_amber_rounded,
                                color: Colors.red),
                            const SizedBox(width: 10),
                            Expanded(
                              child: Text(
                                pesanBentrok,
                                style: const TextStyle(
                                  color: Colors.red,
                                  fontSize: 12,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                    const SizedBox(height: 12),
                    TextField(
                      controller: pimpinanController,
                      decoration: InputDecoration(
                        labelText: 'Pimpinan / Penanggung Jawab Rapat',
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                        prefixIcon: const Icon(Icons.person),
                      ),
                    ),
                    const SizedBox(height: 20),
                    SizedBox(
                      width: double.infinity,
                      height: 48,
                      child: ElevatedButton(
                        style: ElevatedButton.styleFrom(
                          backgroundColor:
                              isBentrok ? Colors.grey : const Color(0xFF0D47A1),
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(10),
                          ),
                        ),
                        onPressed: isBentrok
                            ? () {
                                ScaffoldMessenger.of(context).showSnackBar(
                                  const SnackBar(
                                    content: Text(
                                        'Tidak bisa mengajukan! Ruangan bentrok di tanggal dan jam tersebut.'),
                                    backgroundColor: Colors.red,
                                  ),
                                );
                              }
                            : () {
                                setState(() {
                                  _agendas.insert(0, {
                                    'judul': judulController.text.isEmpty
                                        ? 'Rapat Peminjaman Baru'
                                        : judulController.text,
                                    'ruangan': selectedRuangan ?? 'Utama',
                                    'namaRuangan': selectedRuangan == 'Vicon'
                                        ? 'Ruang Video Conference'
                                        : selectedRuangan == 'Diskusi1'
                                            ? 'Ruang Rapat Diskusi 1'
                                            : 'Ruang Rapat Utama (Lt. 2)',
                                    'waktu':
                                        '${jamMulaiController.text} - ${jamSelesaiController.text} WIB',
                                    'jamMulai': jamMulaiController.text,
                                    'jamSelesai': jamSelesaiController.text,
                                    'tanggal': dateController.text,
                                    'status': 'Mendatang',
                                    'pimpinan': pimpinanController.text.isEmpty
                                        ? widget.loggedInUser
                                        : pimpinanController.text,
                                  });
                                });

                                Navigator.pop(context);
                                ScaffoldMessenger.of(context).showSnackBar(
                                  SnackBar(
                                    content: Text(
                                        'Pengajuan Peminjaman Ruang untuk Tanggal ${dateController.text} Berhasil Ditambahkan!'),
                                    backgroundColor: Colors.green,
                                  ),
                                );
                              },
                        child: Text(
                          isBentrok ? 'Jadwal Bentrok' : 'Kirim Pengajuan',
                          style: const TextStyle(
                            color: Colors.white,
                            fontSize: 16,
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                      ),
                    ),
                    const SizedBox(height: 20),
                  ],
                ),
              ),
            );
          },
        );
      },
    );
  }

  Widget _buildBerandaContent() {
    return SingleChildScrollView(
      padding: const EdgeInsets.all(16.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Container(
            width: double.infinity,
            padding: const EdgeInsets.all(16),
            decoration: BoxDecoration(
              gradient: const LinearGradient(
                colors: [Color(0xFF0D47A1), Color(0xFF1976D2)],
                begin: Alignment.topLeft,
                end: Alignment.bottomRight,
              ),
              borderRadius: BorderRadius.circular(16),
            ),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                const Text(
                  'Sistem Informasi Manajemen Agenda Ruang',
                  style: TextStyle(color: Colors.white70, fontSize: 12),
                ),
                const SizedBox(height: 6),
                Text(
                  'Selamat Datang, ${widget.loggedInUser}!',
                  style: const TextStyle(
                    color: Colors.white,
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(height: 8),
                const Text(
                  'Pantau dan ajukan peminjaman ruang rapat Diskominfo dengan mudah.',
                  style: TextStyle(color: Colors.white, fontSize: 13),
                ),
              ],
            ),
          ),
          const SizedBox(height: 20),
          Row(
            children: [
              Expanded(
                child: _buildStatCard(
                  'Ruangan',
                  '5 Ruang',
                  Icons.door_sliding_outlined,
                  Colors.blue,
                  onTap: () => _showDaftarRuangan(context),
                ),
              ),
              const SizedBox(width: 12),
              Expanded(
                child: _buildStatCard(
                  'Rapat Hari Ini',
                  '${_agendas.where((a) => a['tanggal'] == '14/10/2026').length} Agenda',
                  Icons.event_available,
                  Colors.orange,
                  onTap: () => _showRapatHariIni(context),
                ),
              ),
            ],
          ),
          const SizedBox(height: 24),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              const Text(
                'Agenda Rapat Terbaru',
                style: TextStyle(
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                  color: Color(0xFF2C3E50),
                ),
              ),
              GestureDetector(
                onTap: () {
                  setState(() {
                    _selectedIndex = 1;
                  });
                },
                child: const Text(
                  'Lihat Semua',
                  style: TextStyle(
                    color: Color(0xFF0D47A1),
                    fontWeight: FontWeight.w600,
                  ),
                ),
              ),
            ],
          ),
          const SizedBox(height: 12),
          ListView.builder(
            shrinkWrap: true,
            physics: const NeverScrollableScrollPhysics(),
            itemCount: _agendas.length,
            itemBuilder: (context, index) {
              final item = _agendas[index];
              final isLive = item['status'] == 'Berlangsung';

              return Card(
                margin: const EdgeInsets.only(bottom: 12),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(12),
                ),
                elevation: 2,
                child: Padding(
                  padding: const EdgeInsets.all(14.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Container(
                            padding: const EdgeInsets.symmetric(
                              horizontal: 10,
                              vertical: 4,
                            ),
                            decoration: BoxDecoration(
                              color: isLive
                                  ? Colors.red.shade50
                                  : Colors.blue.shade50,
                              borderRadius: BorderRadius.circular(20),
                            ),
                            child: Text(
                              item['status']!,
                              style: TextStyle(
                                color: isLive ? Colors.red : Colors.blue,
                                fontSize: 11,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                          Text(
                            item['tanggal']!,
                            style: TextStyle(
                              color: Colors.grey.shade600,
                              fontSize: 12,
                            ),
                          ),
                        ],
                      ),
                      const SizedBox(height: 10),
                      Text(
                        item['judul']!,
                        style: const TextStyle(
                          fontSize: 15,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      const SizedBox(height: 8),
                      Row(
                        children: [
                          const Icon(Icons.location_on_outlined,
                              size: 16, color: Colors.grey),
                          const SizedBox(width: 4),
                          Text(
                            item['namaRuangan']!,
                            style: const TextStyle(
                                fontSize: 12, color: Colors.black87),
                          ),
                        ],
                      ),
                      const SizedBox(height: 4),
                      Row(
                        children: [
                          const Icon(Icons.access_time,
                              size: 16, color: Colors.grey),
                          const SizedBox(width: 4),
                          Text(
                            item['waktu']!,
                            style: const TextStyle(
                                fontSize: 12, color: Colors.black87),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              );
            },
          ),
        ],
      ),
    );
  }

  Widget _buildJadwalContent() {
    return Padding(
      padding: const EdgeInsets.all(16.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          const Text(
            'Jadwal Agenda Rapat',
            style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),
          Expanded(
            child: ListView.builder(
              itemCount: _agendas.length,
              itemBuilder: (context, index) {
                final item = _agendas[index];
                return ListTile(
                  contentPadding: const EdgeInsets.symmetric(vertical: 8),
                  leading: const CircleAvatar(
                    backgroundColor: Color(0xFF0D47A1),
                    child: Icon(Icons.event, color: Colors.white),
                  ),
                  title: Text(item['judul']!,
                      style: const TextStyle(fontWeight: FontWeight.bold)),
                  subtitle: Text('${item['namaRuangan']} • ${item['waktu']}'),
                  trailing: Text(item['tanggal']!,
                      style: const TextStyle(color: Colors.blue)),
                );
              },
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildProfilContent() {
    String userNameFormatted = widget.loggedInUser.isNotEmpty
        ? widget.loggedInUser[0].toUpperCase() +
            widget.loggedInUser.substring(1)
        : 'Pengguna Diskominfo';

    bool isNumeric = double.tryParse(widget.loggedInUser) != null;
    String nipText = isNumeric ? widget.loggedInUser : '19981012 202401 2 001';

    String cleanUsername =
        widget.loggedInUser.toLowerCase().replaceAll(' ', '');
    String emailPegawai = "$cleanUsername@bogorkab.go.id";

    return Padding(
      padding: const EdgeInsets.all(20.0),
      child: Column(
        children: [
          const SizedBox(height: 20),
          const CircleAvatar(
            radius: 45,
            backgroundColor: Color(0xFF0D47A1),
            child: Icon(Icons.person, size: 50, color: Colors.white),
          ),
          const SizedBox(height: 16),
          Text(
            userNameFormatted,
            style: const TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
          ),
          const Text(
            'Staf Umum', // Jabatan diubah menjadi umum
            style: TextStyle(color: Colors.grey),
          ),
          const SizedBox(height: 30),
          Card(
            child: Column(
              children: [
                ListTile(
                  leading: const Icon(Icons.badge, color: Color(0xFF0D47A1)),
                  title: const Text('NIP / ID Pegawai'),
                  subtitle: Text(nipText),
                ),
                const Divider(height: 1),
                ListTile(
                  leading: const Icon(Icons.email, color: Color(0xFF0D47A1)),
                  title: const Text('Email Pegawai'),
                  subtitle: Text(emailPegawai),
                ),
                const Divider(height: 1),
                const ListTile(
                  leading: Icon(Icons.domain, color: Color(0xFF0D47A1)),
                  title: Text('Email Dinas / Instansi'),
                  subtitle: Text('diskominfo@bogorkab.go.id'),
                ),
                const Divider(height: 1),
                ListTile(
                  leading: const Icon(Icons.logout, color: Colors.red),
                  title: const Text('Keluar / Logout',
                      style: TextStyle(color: Colors.red)),
                  onTap: () {
                    Navigator.pushReplacement(
                      context,
                      MaterialPageRoute(
                          builder: (context) => const LoginScreen()),
                    );
                  },
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    Widget activeBody;
    if (_selectedIndex == 0) {
      activeBody = _buildBerandaContent();
    } else if (_selectedIndex == 1) {
      activeBody = _buildJadwalContent();
    } else {
      activeBody = _buildProfilContent();
    }

    return Scaffold(
      backgroundColor: const Color(0xFFF5F7FA),
      appBar: AppBar(
        elevation: 0,
        backgroundColor: const Color(0xFF0D47A1),
        title: const Text(
          'SIMAR DISKOMINFO',
          style: TextStyle(
            color: Colors.white,
            fontWeight: FontWeight.bold,
            fontSize: 18,
          ),
        ),
        actions: [
          IconButton(
            icon: const Icon(Icons.notifications_none, color: Colors.white),
            onPressed: () {
              ScaffoldMessenger.of(context).showSnackBar(
                const SnackBar(
                  content: Text('Tidak ada pemberitahuan baru hari ini.'),
                ),
              );
            },
          ),
          IconButton(
            icon: const Icon(Icons.logout, color: Colors.white),
            tooltip: 'Keluar',
            onPressed: () {
              Navigator.pushReplacement(
                context,
                MaterialPageRoute(builder: (context) => const LoginScreen()),
              );
            },
          ),
        ],
      ),
      body: activeBody,
      floatingActionButton: _selectedIndex == 0
          ? FloatingActionButton.extended(
              onPressed: () => _showFormPinjamRuang(context),
              backgroundColor: const Color(0xFF0D47A1),
              icon: const Icon(Icons.add, color: Colors.white),
              label: const Text(
                'Pinjam Ruang',
                style:
                    TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
              ),
            )
          : null,
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _selectedIndex,
        onTap: (index) {
          setState(() {
            _selectedIndex = index;
          });
        },
        selectedItemColor: const Color(0xFF0D47A1),
        unselectedItemColor: Colors.grey,
        items: const [
          BottomNavigationBarItem(
            icon: Icon(Icons.dashboard_rounded),
            label: 'Beranda',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.calendar_month_rounded),
            label: 'Jadwal',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person_rounded),
            label: 'Profil',
          ),
        ],
      ),
    );
  }

  Widget _buildStatCard(String title, String value, IconData icon, Color color,
      {VoidCallback? onTap}) {
    return InkWell(
      onTap: onTap,
      borderRadius: BorderRadius.circular(12),
      child: Container(
        padding: const EdgeInsets.all(14),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(12),
          boxShadow: [
            BoxShadow(
              color: Colors.black.withOpacity(0.04),
              blurRadius: 8,
              offset: const Offset(0, 2),
            ),
          ],
        ),
        child: Row(
          children: [
            CircleAvatar(
              backgroundColor: color.withOpacity(0.1),
              child: Icon(icon, color: color, size: 20),
            ),
            const SizedBox(width: 12),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  title,
                  style: const TextStyle(fontSize: 11, color: Colors.grey),
                ),
                Text(
                  value,
                  style: const TextStyle(
                    fontSize: 14,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}

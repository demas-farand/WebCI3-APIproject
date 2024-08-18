package com.dmz1.ci3webrestapi.controller;
import java.util.Date;
import java.util.List;
import org.springframework.http.ResponseEntity;
import org.springframework.http.HttpStatus;
import com.dmz1.ci3webrestapi.model.Lokasi;
import com.dmz1.ci3webrestapi.model.LokasiRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {
    private final LokasiRepository lokasiRepository;

    @Autowired
    public LokasiController(LokasiRepository lokasiRepository) {
        this.lokasiRepository = lokasiRepository;
    }

    @PostMapping
    public Lokasi addLokasi(@RequestBody Lokasi lokasi) {
        lokasi.setCreatedAt(new Date());  // Mengatur waktu saat ini untuk createdAt
        Lokasi saveLokasi = lokasiRepository.save(lokasi);
        return lokasiRepository.save(lokasi);
    }

    @GetMapping
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    @PutMapping("/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable Long id, @RequestBody Lokasi lokasi) {
        Lokasi existingLokasi = lokasiRepository.findById(id).orElse(null);
        if (existingLokasi != null) {
            existingLokasi.setNamaLokasi(lokasi.getNamaLokasi());
            existingLokasi.setNegara(lokasi.getNegara());
            existingLokasi.setProvinsi(lokasi.getProvinsi());
            existingLokasi.setKota(lokasi.getKota());
            return ResponseEntity.ok(lokasiRepository.save(existingLokasi));
        }
        return ResponseEntity.status(HttpStatus.NOT_FOUND).build();
    }


    @DeleteMapping("/{id}")
    public void deleteLokasi(@PathVariable Long id) {
        lokasiRepository.deleteById(id);
    }
}

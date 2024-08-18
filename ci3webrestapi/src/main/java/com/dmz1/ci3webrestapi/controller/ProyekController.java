package com.dmz1.ci3webrestapi.controller;
import java.util.Date;
import java.util.List;
import com.dmz1.ci3webrestapi.model.Proyek;
import com.dmz1.ci3webrestapi.model.ProyekRepository;
import com.dmz1.ci3webrestapi.model.ProyekLokasiRepository;
import org.springframework.http.ResponseEntity;
import org.springframework.http.HttpStatus;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/proyek")
public class ProyekController {
    private final ProyekRepository proyekRepository;
    private final ProyekLokasiRepository proyekLokasiRepository;

    @Autowired
    public ProyekController(ProyekRepository proyekRepository, ProyekLokasiRepository proyekLokasiRepository) {
        this.proyekRepository = proyekRepository;
        this.proyekLokasiRepository = proyekLokasiRepository;
    }

    @PostMapping
    public Proyek addProyek(@RequestBody Proyek proyek) {
        proyek.setCreatedAt(new Date());
        Proyek savedProyek = proyekRepository.save(proyek);
        return proyekRepository.save(proyek);
    }


    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    @PutMapping("/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable Long id, @RequestBody Proyek proyek) {
        Proyek existingProyek = proyekRepository.findById(id).orElse(null);
        if (existingProyek != null) {
            existingProyek.setNamaProyek(proyek.getNamaProyek());
            existingProyek.setClient(proyek.getClient());
            existingProyek.setTglMulai(proyek.getTglMulai());
            existingProyek.setTglSelesai(proyek.getTglSelesai());
            existingProyek.setPimpinanProyek(proyek.getPimpinanProyek());
            existingProyek.setKeterangan(proyek.getKeterangan());
            return ResponseEntity.ok(proyekRepository.save(existingProyek));
        }
        return ResponseEntity.status(HttpStatus.NOT_FOUND).build();
    }

    @DeleteMapping("/{id}")
    public void deleteProyek(@PathVariable Long id) {
        proyekRepository.deleteById(id);
    }
}

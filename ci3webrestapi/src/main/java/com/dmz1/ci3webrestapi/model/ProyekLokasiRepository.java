package com.dmz1.ci3webrestapi.model;
import com.dmz1.ci3webrestapi.model.ProyekLokasi;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
@Repository
public interface ProyekLokasiRepository extends JpaRepository<ProyekLokasi, Long>
{
}

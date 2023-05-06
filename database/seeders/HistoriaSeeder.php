<?php

namespace Database\Seeders;

use App\Models\Historia;
use Illuminate\Database\Seeder;

class HistoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $items = [
            ['descripcion' => '¿Se siente bien hoy?'],
            ['descripcion' => '¿Ingirió alimentos en las últimas horas?'],
            ['descripcion' => '¿Ha donado sangre anteriormente?'],
            ['descripcion' => '¿Ha sido rechazado alguna vez como donante?'],
            ['descripcion' => '¿Tuvo alguna reacción durante o después de la donación?'],
            ['descripcion' => '¿Conoció el resultado de los exámenes en ocasión de su donación?'],
            ['descripcion' => '¿Ha tenido diarrea, gripe o fiebre en las últimas semanas?'],
            ['descripcion' => '¿Ha estado en control con un médico por alguna enfermedad importante?'],
            ['descripcion' => '¿Ha sido sometido a cirugía alguna vez?'],
            ['descripcion' => '¿Ha recibido transfusión de sangre?'],
            ['descripcion' => '¿Ha sido sometido a cirugía odontológica en los últimos 3 días?'],
            ['descripcion' => '¿Ha tenido paludismos alguna vez?'],
            ['descripcion' => '¿Ha estado en áreas palúdicas en los últimos 6 meses?'],
            ['descripcion' => '¿Ha padecido alguna de las enfermedades que a  continuación se mencionan? Hipertensión arterial, diabetes, tuberculosis, cáncer, enfermedad de piel, convulsiones, epilepsia, enfermedad del corazón, pulmón o riñón.'],
            ['descripcion' => '¿Ha tenido hepatitis, orina oscura o piel amarilla alguna vez?'],
            ['descripcion' => '¿Ha tenido contacto estrecho o relaciones sexuales con alguien con hepatitis?'],
            ['descripcion' => '¿Tiene tatuajes, pirsin, etc. En el cuerpo?'],
            ['descripcion' => '¿Ha recibido hormonas de crecimiento de origen humano alguna vez?'],
            ['descripcion' => '¿Ha tenido familiares con enfermedad Cezfeldt-jakob? ¿Ha recibido trasplante de córnea o duramadre?'],
            ['descripcion' => '¿Está tomando algún tipo de medicamento actualmente? ¿Ha tomado aspirina en los últimos 3 meses?'],
            ['descripcion' => '¿Ha sido picado por un chipo o habitado en vivienda rural en zonas endémicas para la enfermedad de Chagas?'],
            ['descripcion' => '¿Ha recibido vacunación en el último año?'],
            ['descripcion' => 'HOMBRES: ¿Ha tenido relaciones sexuales con otro hombre, aunque sea una sola vez? ¿Ha tenido relaciones sexuales con prostitutas en los últimos 12 días?'],
            ['descripcion' => 'MUJERES: ¿Ha tenido relaciones sexuales con mujeres?'],
            ['descripcion' => '¿Está usted embarazada o ha tenido pérdidas en los últimos seis meses  y medio?'],
            ['descripcion' => '¿Ha usado algún tipo de drogas, aunque sea una sola vez?'],
            ['descripcion' => '¿Ha tenido usted alguna prueba positiva para sida o hepatitis?'],
            ['descripcion' => '¿Ha tenido alguna vez enfermedades de transmisión sexual, sífilis o gonorrea?'],
            ['descripcion' => '¿Ha tenido usted relaciones sexuales aunque sea una sola vez con alguien que tenga una prueba positiva de sida'],
            ['descripcion' => '¿Se considera usted dentro de alguno de los siguientes grupos de riesgo para sida: Promiscuo, prostituta, bisexual, homosexual, drogadicto, hemofílico?'],
            ['descripcion' => '¿Ha sido usted encarcelado por más de 3 días en los últimos 12 meses?'],
            ['descripcion' => '¿ha intercambiado usted alguna vez sexo por droga o por dinero?'],
            ['descripcion' => '¿Cree usted que su sangre es segura para ser donada?'],
            ['descripcion' => '¿Ha entendido todas las preguntas anteriores?'],
         
        ];


        
        foreach ($items as $item) {
            Historia::updateOrCreate(['descripcion' => $item['descripcion']], $item);
        }
    }
}

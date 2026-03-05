<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumVariablesSistema
{
    const AFC_Cuenta = 115;
    const Ahorro = 59;
    const Anticipo = 122;
    const Aporte_ARL = 1;
    const Aporte_CCF = 2;
    const Aporte_Empleado_AFP = 3;
    const Aporte_Empleado_EPS = 4;
    const Aporte_Empleador_AFP = 5;
    const Aporte_Empleador_EPS = 6;
    const Aporte_ESAP = 7;
    const Aporte_ICBF = 8;
    const Aporte_MinisterioEducacion = 9;
    const Aporte_Sena = 10;
    const Aporte_Valor_UPC_Adicional = 11;
    const Aporte_Voluntario_AFP_Empleador = 12;
    const Aporte_Voluntario_AFP_NoRetenido = 13;
    const Aporte_Voluntario_AFP_InversionEmpleado = 14;
    const Aporte_Voluntario_AFP_ObligatorioEmpleado = 15;
    const ApoyoASostenimiento = 108;
    const Auxilio = 114;
    const Base_Reduccion_ReteFuente = 90;
    const Base_Prestacional = 123;
    const Base_SeguridadSocial = 124;
    const Bonificacion_HS = 96;
    const Bonificacion = 112;
    const Bono = 118;
    const Bono_PagoAlimentacion = 120;
    const Comision = 16;
    const Compensacion_ExtraOrdinaria = 16;
    const Compensacion_Ordinaria = 117;
    const Cooperativa = 119;
    const CuotaSostenimiento = 82;
    const CostoNomina = 74;
    const ContarDIAS = 104;
    const DeudaTerceros = 121;
    const Dotacion = 107;
    const Educacion = 113;
    const EmbargoAlimento = 17;
    const EmbargoComercial = 18;
    const EmbargoCooperativa = 19;
    const Fondo = 20;
    const FondoFSP_Solidaridad = 21;
    const FondoFSP_Subsistencia = 22;
    const Gastos_Representacion = 103;
    const HoraExtraDiurna = 83;
    const HoraExtraNocturna = 84;
    const HoraExtraDominicalDiurna = 85;
    const HoraExtraDominicalNocturna = 86;
    const HoraDominical = 87;
    const HuelgaLegal = 116;
    const Indegnizacion = 23;
    const IndegnizacionRetiro = 110;
    const Ingresos_No_Prestacionales = 105;
    const Intereses = 24;
    const Libranza = 126;
    const Liquidacion_Cesantias = 25;
    const Liquidacion_IntCesantias = 26;
    const Liquidacion_Primas = 27;
    const Liquidacion_Vacaciones = 28;
    const Liquidacion_Prima_Vacaciones = 101;
    const Liquidacion_Prima_Convencional = 102;
    const No_Aplicar_Tiempo = 95;
    const Pago_IncapARL_ARL = 29;
    const Pago_Tercero = 127;
    const Pago_IncapARL_Patron = 30;
    const Pago_IncapIGE_EPS = 31;
    const Pago_IncapIGE_Patron = 32;
    const Pago_IncapLMA_EPS = 33;
    const Prestamos = 34;
    const Provision_Cesantias = 35;
    const Provision_IntCesantias = 36;
    const Provision_Primas = 37;
    const Provision_Vacaciones = 38;
    const Provision_Prima_Vacaciones = 99;
    const Provision_Prima_Convencional = 100;
    const RecargoNocturno = 39;
    const RecargoNocturnoDominical = 88;
    const RecargoNocturnoEspecial = 89;
    const Reintegro = 111;
    const Retefuente = 40;
    const RetroActivo_Salario = 93;
    const RetroActivo_HorasExtras = 98;
    const RetroActivo_Vacaciones = 95;
    const Salario = 41;
    const Saldo_Negativo = 42;
    const Saldo_Positivo = 43;
    const SancionPublica = 125;
    const SancionPrivada = 126;
    const Sindicato = 103;
    const SubsidioTransporte = 44;
    const Teletrabajo = 109;
    const ValesAlimentacion = 92;
    const Viatico = 102;
    const IGE_IncapacidadGeneral = 45;
    const IRP_IncapacidadAccidenteTrabajo = 46;
    const LMA_LicenciaMaternidad = 47;
    const SLN_SuspencionTemporalLicenciaNoRemunerada = 48;
    const VST_VariacionTransitoriaSalario = 49;
    const VSP_VariacionPermanenteSalario = 50;
    const TDE_TrasladoDesdeOtraEPS = 51;
    const TAE_TrasladoAotraEPS = 52;
    const TDP_TrasladoDesdeOtraAFP = 53;
    const TAP_TrasladoAotraAFP = 54;
    const VTE_CambioTarifaEspecial = 55;
    const AFP_AporteVoluntario = 56;
    const VCT_VariacionCentrosTrabajo = 57;
    const Dia_NoTrabajado = 94;
    const LRM_LicenciaRemunerada = 106;
    const CuentaPorPagar = 58;
    const Cambio_TipoCotizante = 60;
    const Cambio_SubTipoCotizante = 61;
    const Cambio_CuentaBancaria = 62;
    const Cambio_RubroContable = 63;
    const Cambio_Sucursal = 64;
    const Cambio_SucursalPILA = 91;
    const Cambio_Sede = 65;
    const Cambio_Division = 66;
    const Cambio_TipoPagoSubTransporte = 67;
    const Cambio_Cargo = 68;
    const Cambio_Contrato = 69;
    const Cambio_CajaCompensacion = 70;
    const Cambio_FondoCesantias = 71;
    const Cambio_PorcentajeARL = 73;
    const Cambio_Extranjero = 75;
    const Cambio_ResideExterior = 76;
    const Cambio_ReteFuente = 97;
    const Cambio_PoseeCuenta = 77;
    const Cambio_TipoPago = 78;
    const Cambio_AreaTrabajo = 79;
    const Cambio_Activo = 80;
    const Cambio_Revincular = 81;

    private static $descriptions = [
        ["id" => self::AFC_Cuenta, "code" => "AFC_Cuenta", "description" => "OTROS"],
        ["id" => self::Ahorro, "code" => "Ahorro", "description" => "OTROS"],
        ["id" => self::Anticipo, "code" => "Anticipo", "description" => "OTROS"],
        ["id" => self::Aporte_ARL, "code" => "Aporte_ARL", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_CCF, "code" => "Aporte_CCF", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_Empleado_AFP, "code" => "Aporte_Empleado_AFP", "description" => "OTROS"],
        ["id" => self::Aporte_Empleado_EPS, "code" => "Aporte_Empleado_EPS", "description" => "OTROS"],
        ["id" => self::Aporte_Empleador_AFP, "code" => "Aporte_Empleador_AFP", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_Empleador_EPS, "code" => "Aporte_Empleador_EPS", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_ESAP, "code" => "Aporte_ESAP", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_ICBF, "code" => "Aporte_ICBF", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_MinisterioEducacion, "code" => "Aporte_MinisterioEducacion", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_Sena, "code" => "Aporte_Sena", "description" => "PROV_SEGSOC"],
        ["id" => self::Aporte_Valor_UPC_Adicional, "code" => "Aporte_Valor_UPC_Adicional", "description" => "OTROS"],
        ["id" => self::Aporte_Voluntario_AFP_Empleador, "code" => "Aporte_Voluntario_AFP_Empleador", "description" => "OTROS"],
        ["id" => self::Aporte_Voluntario_AFP_NoRetenido, "code" => "Aporte_Voluntario_AFP_NoRetenido", "description" => "OTROS"],
        ["id" => self::Aporte_Voluntario_AFP_InversionEmpleado, "code" => "Aporte_Voluntario_AFP_InversionEmpleado", "description" => "OTROS"],
        ["id" => self::Aporte_Voluntario_AFP_ObligatorioEmpleado, "code" => "Aporte_Voluntario_AFP_ObligatorioEmpleado", "description" => "OTROS"],
        ["id" => self::ApoyoASostenimiento, "code" => "ApoyoASostenimiento", "description" => "OTROS"],
        ["id" => self::Auxilio, "code" => "Auxilio", "description" => "OTROS"],
        ["id" => self::Base_Reduccion_ReteFuente, "code" => "Base_Reduccion_ReteFuente", "description" => "OTROS"],
        ["id" => self::Base_Prestacional, "code" => "Base_Prestacional", "description" => "AGRUPAR"],
        ["id" => self::Base_SeguridadSocial, "code" => "Base_SeguridadSocial", "description" => "AGRUPAR"],
        ["id" => self::Bonificacion_HS, "code" => "Bonificacion_HS", "description" => "OTROS"],
        ["id" => self::Bonificacion, "code" => "Bonificacion", "description" => "OTROS"],
        ["id" => self::Bono, "code" => "Bono", "description" => "OTROS"],
        ["id" => self::Bono_PagoAlimentacion, "code" => "Bono_PagoAlimentacion", "description" => "OTROS"],
        ["id" => self::Comision, "code" => "Comision", "description" => "OTROS"],
        ["id" => self::Compensacion_ExtraOrdinaria, "code" => "Compensacion_ExtraOrdinaria", "description" => "OTROS"],
        ["id" => self::Compensacion_Ordinaria, "code" => "Compensacion_Ordinaria", "description" => "OTROS"],
        ["id" => self::Cooperativa, "code" => "Cooperativa", "description" => "OTROS"],
        ["id" => self::CuotaSostenimiento, "code" => "CuotaSostenimiento", "description" => "OTROS"],
        ["id" => self::CostoNomina, "code" => "CostoNomina", "description" => "OTROS"],
        ["id" => self::ContarDIAS, "code" => "ContarDIAS", "description" => "FORMULA"],
        ["id" => self::DeudaTerceros, "code" => "DeudaTerceros", "description" => "OTROS"],
        ["id" => self::Dotacion, "code" => "Dotacion", "description" => "OTROS"],
        ["id" => self::Educacion, "code" => "Educacion", "description" => "OTROS"],
        ["id" => self::EmbargoAlimento, "code" => "EmbargoAlimento", "description" => "OTROS"],
        ["id" => self::EmbargoComercial, "code" => "EmbargoComercial", "description" => "OTROS"],
        ["id" => self::EmbargoCooperativa, "code" => "EmbargoCooperativa", "description" => "OTROS"],
        ["id" => self::Fondo, "code" => "Fondo", "description" => "OTROS"],
        ["id" => self::FondoFSP_Solidaridad, "code" => "FondoFSP_Solidaridad", "description" => "OTROS"],
        ["id" => self::FondoFSP_Subsistencia, "code" => "FondoFSP_Subsistencia", "description" => "OTROS"],
        ["id" => self::Gastos_Representacion, "code" => "Gastos_Representacion", "description" => "OTROS"],
        ["id" => self::HoraExtraDiurna, "code" => "HoraExtraDiurna", "description" => "HORAS_EXTRA"],
        ["id" => self::HoraExtraNocturna, "code" => "HoraExtraNocturna", "description" => "HORAS_EXTRA"],
        ["id" => self::HoraExtraDominicalDiurna, "code" => "HoraExtraDominicalDiurna", "description" => "HORAS_EXTRA"],
        ["id" => self::HoraExtraDominicalNocturna, "code" => "HoraExtraDominicalNocturna", "description" => "HORAS_EXTRA"],
        ["id" => self::HoraDominical, "code" => "HoraDominical", "description" => "HORAS_EXTRA"],
        ["id" => self::HuelgaLegal, "code" => "HuelgaLegal", "description" => "OTROS"],
        ["id" => self::Indegnizacion, "code" => "Indegnizacion", "description" => "OTROS"],
        ["id" => self::IndegnizacionRetiro, "code" => "IndegnizacionRetiro", "description" => "OTROS"],
        ["id" => self::Ingresos_No_Prestacionales, "code" => "Ingresos_No_Prestacionales", "description" => "OTROS"],
        ["id" => self::Intereses, "code" => "Intereses", "description" => "OTROS"],
        ["id" => self::Libranza, "code" => "Libranza", "description" => "OTROS"],
        ["id" => self::Liquidacion_Cesantias, "code" => "Liquidacion_Cesantias", "description" => "LIQUIDACION"],
        ["id" => self::Liquidacion_IntCesantias, "code" => "Liquidacion_IntCesantias", "description" => "LIQUIDACION"],
        ["id" => self::Liquidacion_Primas, "code" => "Liquidacion_Primas", "description" => "LIQUIDACION"],
        ["id" => self::Liquidacion_Vacaciones, "code" => "Liquidacion_Vacaciones", "description" => "LIQUIDACION"],
        ["id" => self::Liquidacion_Prima_Vacaciones, "code" => "Liquidacion_Prima_Vacaciones", "description" => "LIQUIDACION"],
        ["id" => self::Liquidacion_Prima_Convencional, "code" => "Liquidacion_Prima_Convencional", "description" => "LIQUIDACION"],
        ["id" => self::No_Aplicar_Tiempo, "code" => "No_Aplicar_Tiempo", "description" => "OTROS"],
        ["id" => self::Pago_IncapARL_ARL, "code" => "Pago_IncapARL_ARL", "description" => "OTROS"],
        ["id" => self::Pago_Tercero, "code" => "Pago_Tercero", "description" => "OTROS"],
        ["id" => self::Pago_IncapARL_Patron, "code" => "Pago_IncapARL_Patron", "description" => "OTROS"],
        ["id" => self::Pago_IncapIGE_EPS, "code" => "Pago_IncapIGE_EPS", "description" => "OTROS"],
        ["id" => self::Pago_IncapIGE_Patron, "code" => "Pago_IncapIGE_Patron", "description" => "OTROS"],
        ["id" => self::Pago_IncapLMA_EPS, "code" => "Pago_IncapLMA_EPS", "description" => "OTROS"],
        ["id" => self::Prestamos, "code" => "Prestamos", "description" => "OTROS"],
        ["id" => self::Provision_Cesantias, "code" => "Provision_Cesantias", "description" => "PROV_PREST"],
        ["id" => self::Provision_IntCesantias, "code" => "Provision_IntCesantias", "description" => "PROV_PREST"],
        ["id" => self::Provision_Primas, "code" => "Provision_Primas", "description" => "PROV_PREST"],
        ["id" => self::Provision_Vacaciones, "code" => "Provision_Vacaciones", "description" => "PROV_PREST"],
        ["id" => self::Provision_Prima_Vacaciones, "code" => "Provision_Prima_Vacaciones", "description" => "PROV_PREST"],
        ["id" => self::Provision_Prima_Convencional, "code" => "Provision_Prima_Convencional", "description" => "PROV_PREST"],
        ["id" => self::RecargoNocturno, "code" => "RecargoNocturno", "description" => "HORAS_EXTRA"],
        ["id" => self::RecargoNocturnoDominical, "code" => "RecargoNocturnoDominical", "description" => "HORAS_EXTRA"],
        ["id" => self::RecargoNocturnoEspecial, "code" => "RecargoNocturnoEspecial", "description" => "HORAS_EXTRA"],
        ["id" => self::Reintegro, "code" => "Reintegro", "description" => "OTROS"],
        ["id" => self::Retefuente, "code" => "Retefuente", "description" => "OTROS"],
        ["id" => self::RetroActivo_Salario, "code" => "RetroActivo_Salario", "description" => "OTROS"],
        ["id" => self::RetroActivo_HorasExtras, "code" => "RetroActivo_HorasExtras", "description" => "OTROS"],
        ["id" => self::RetroActivo_Vacaciones, "code" => "RetroActivo_Vacaciones", "description" => "OTROS"],
        ["id" => self::Salario, "code" => "Salario", "description" => "OTROS"],
        ["id" => self::Saldo_Negativo, "code" => "Saldo_Negativo", "description" => "OTROS"],
        ["id" => self::Saldo_Positivo, "code" => "Saldo_Positivo", "description" => "OTROS"],
        ["id" => self::SancionPublica, "code" => "SancionPublica", "description" => "OTROS"],
        ["id" => self::SancionPrivada, "code" => "SancionPrivada", "description" => "OTROS"],
        ["id" => self::Sindicato, "code" => "Sindicato", "description" => "OTROS"],
        ["id" => self::SubsidioTransporte, "code" => "SubsidioTransporte", "description" => "OTROS"],
        ["id" => self::Teletrabajo, "code" => "Teletrabajo", "description" => "OTROS"],
        ["id" => self::ValesAlimentacion, "code" => "ValesAlimentacion", "description" => "OTROS"],
        ["id" => self::Viatico, "code" => "Viatico", "description" => "OTROS"],
        ["id" => self::IGE_IncapacidadGeneral, "code" => "IGE_IncapacidadGeneral", "description" => "PLANILLA_UNICA"],
        ["id" => self::IRP_IncapacidadAccidenteTrabajo, "code" => "IRP_IncapacidadAccidenteTrabajo", "description" => "PLANILLA_UNICA"],
        ["id" => self::LMA_LicenciaMaternidad, "code" => "LMA_LicenciaMaternidad", "description" => "PLANILLA_UNICA"],
        ["id" => self::SLN_SuspencionTemporalLicenciaNoRemunerada, "code" => "SLN_SuspencionTemporalLicenciaNoRemunerada", "description" => "PLANILLA_UNICA"],
        ["id" => self::VST_VariacionTransitoriaSalario, "code" => "VST_VariacionTransitoriaSalario", "description" => "PLANILLA_UNICA"],
        ["id" => self::VSP_VariacionPermanenteSalario, "code" => "VSP_VariacionPermanenteSalario", "description" => "PLANILLA_UNICA"],
        ["id" => self::TDE_TrasladoDesdeOtraEPS, "code" => "TDE_TrasladoDesdeOtraEPS", "description" => "PLANILLA_UNICA"],
        ["id" => self::TAE_TrasladoAotraEPS, "code" => "TAE_TrasladoAotraEPS", "description" => "PLANILLA_UNICA"],
        ["id" => self::TDP_TrasladoDesdeOtraAFP, "code" => "TDP_TrasladoDesdeOtraAFP", "description" => "PLANILLA_UNICA"],
        ["id" => self::TAP_TrasladoAotraAFP, "code" => "TAP_TrasladoAotraAFP", "description" => "PLANILLA_UNICA"],
        ["id" => self::VTE_CambioTarifaEspecial, "code" => "VTE_CambioTarifaEspecial", "description" => "PLANILLA_UNICA"],
        ["id" => self::AFP_AporteVoluntario, "code" => "AFP_AporteVoluntario", "description" => "PLANILLA_UNICA"],
        ["id" => self::VCT_VariacionCentrosTrabajo, "code" => "VCT_VariacionCentrosTrabajo", "description" => "PLANILLA_UNICA"],
        ["id" => self::Dia_NoTrabajado, "code" => "Dia_NoTrabajado", "description" => "PLANILLA_UNICA"],
        ["id" => self::LRM_LicenciaRemunerada, "code" => "LRM_LicenciaRemunerada", "description" => "PLANILLA_UNICA"],
        ["id" => self::CuentaPorPagar, "code" => "CuentaPorPagar", "description" => "OTROS"],
        ["id" => self::Cambio_TipoCotizante, "code" => "Cambio_TipoCotizante", "description" => "CAMBIOS_V"],
        ["id" => self::Cambio_SubTipoCotizante, "code" => "Cambio_SubTipoCotizante", "description" => "CAMBIOS_V"],
        ["id" => self::Cambio_CuentaBancaria, "code" => "Cambio_CuentaBancaria", "description" => "CAMBIOS_V"],
        ["id" => self::Cambio_RubroContable, "code" => "Cambio_RubroContable", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Sucursal, "code" => "Cambio_Sucursal", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_SucursalPILA, "code" => "Cambio_SucursalPILA", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Sede, "code" => "Cambio_Sede", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Division, "code" => "Cambio_Division", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_TipoPagoSubTransporte, "code" => "Cambio_TipoPagoSubTransporte", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Activo, "code" => "Cambio_Activo", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_AreaTrabajo, "code" => "Cambio_AreaTrabajo", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_CajaCompensacion, "code" => "Cambio_CajaCompensacion", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Contrato, "code" => "Cambio_Contrato", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Extranjero, "code" => "Cambio_Extranjero", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_FondoCesantias, "code" => "Cambio_FondoCesantias", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_PorcentajeARL, "code" => "Cambio_PorcentajeARL", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Cargo, "code" => "Cambio_Cargo", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_PoseeCuenta, "code" => "Cambio_PoseeCuenta", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_ResideExterior, "code" => "Cambio_ResideExterior", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_ReteFuente, "code" => "Cambio_ReteFuente", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_Revincular, "code" => "Cambio_Revincular", "description" => "CAMBIOS_C"],
        ["id" => self::Cambio_TipoPago, "code" => "Cambio_TipoPago", "description" => "CAMBIOS_C"],
    ];

    public static function getCollection()
    {
        return collect(self::$descriptions);
    }

    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    public static function getAll()
    {
        return self::$descriptions;
    }

    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }
    public static function getDescripcion($description)
    {
        $collection = collect();

        foreach (self::$descriptions as $key => $value) {
            if ($value['description'] === $description) {
                $collection->put($key, $value['id']);
            }
        }

        return $collection;
    }

}

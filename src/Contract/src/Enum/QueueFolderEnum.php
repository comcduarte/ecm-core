<?php
declare(strict_types=1);

namespace Core\Contract\Enum;

Enum QueueFolderEnum: string
{
    case ECM_AC = "336160569370";
    case ECM_BD = "345204791467";
    case ECM_BE = "336170845911";
    case ECM_CC = "336160638688";
    case ECM_CN = "336160784911";
    case ECM_CY = "336160614145";
    case ECM_ED = "336171779216";
    case ECM_EM = "336170329423";
    case ECM_EO = "336170654052";
    case ECM_FD = "336162496407";
    case ECM_FN = "336169743749";
    case ECM_GC = "336171147862";
    case ECM_HD = "336172021795";
    case ECM_HR = "336160858951";
    case ECM_IT = "336171795885";
    case ECM_LU = "336169799083";
    case ECM_MO = "336160372539";
    case ECM_PA = "336160424897";
    case ECM_PD = "336169513701";
    case ECM_PK = "336169778027";
    case ECM_PU = "336170183548";
    case ECM_PW = "336161459443";
    case ECM_PY = "336171921517";
    case ECM_PZ = "336172043886";
    case ECM_RC = "336171760152";
    case ECM_RS = "336170394596";
    case ECM_RV = "336160570825";
    case ECM_TA = "336169336596";
    case ECM_TC = "336160573225";
    case ECM_TX = "336170985079";
    case ECM_WS = "336171082891";
    case ECM_YS = "336171630274";
    case ECM_DEPARTMENTS = "336170142610";
    case ECM_LEGAL = "336160775495";
    case ECM_MAYOR = "336171664521";
    case ECM_PURCHASING = "336166331778";
    case ECM_RISK = "336171945517";
    case ECM_VENDOR = "345199902550";
    
    
    /**
     * @return non-empty-string[]
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
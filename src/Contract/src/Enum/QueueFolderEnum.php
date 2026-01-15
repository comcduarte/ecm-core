<?php
declare(strict_types=1);

namespace Core\Contract\Enum;

Enum QueueFolderEnum: string
{
    /**
     * To flip back and forth between production and development, put a space between the asterisk and the slash
     * under the word production, and remove the space between under development, and vice versa.
     */
    
    /*** Production ***/
    case AC = "352155187097";
    case BD = "352158683991";
    case BE = "352589456548";
    case CC = "352158515242";
    case CDBG = "352587578019";
    case CN = "352156775699";
    case ECM_EG = "352157531051";
    case ECM_IT = "352587776524";
    case ED = "352158738093";
    case EM = "352587865757";
    case EO = "352153422658";
    case FD = "352155414876";
    case FN = "352157027667";
    case GC = "352154224263";
    case HD = "352587945272";
    case HR = "352386616195";
    case LU = "352587489095";
    case MO = "352156826206";
    case PA = "352155597129";
    case PD = "352589142863";
    case PK = "352155378264";
    case PU = "352157774369";
    case PW = "352588405548";
    case PY = "352157135066";
    case PZ = "352588931908";
    case RC = "352153609698";
    case RL = "352153854647";
    case RM = "352158656478";
    case RV = "352588525676";
    case SC = "352155160408";
    case SD = "352157783941";
    case TA = "352154416558";
    case TC = "352155030565";
    case TX = "352153976896";
    case WS = "352587714239";
    case YS = "352589278948";
    
    case DEPARTMENTS = "348908902955";
    case LEGAL = "348907511883";
    case MAYOR = "348911714273";
    case PURCHASING = "348907826208";
    case RISK = "348908361510";
    case VENDOR = "348910710012";
    
    
    /*** Development *** /
    case ECM_ONBASE = "336171280120";
    case ECM_TEMPLATES = "343236246817";
    
    case ECM_AC = "354150169370";
    case ECM_BD = "354149802280";
    case ECM_BE = "354151165632";
    case ECM_CC = "354150577825";
    case ECM_CN = "354147529969";
    case ECM_ED = "354151498819";
    case ECM_EG = "354147523172";
    case ECM_EM = "354151067120";
    case ECM_EO = "354149653991";
    case ECM_FD = "354151777899";
    case ECM_FN = "354149720984";
    case ECM_GC = "354150131398";
    case ECM_HD = "354149710822";
    case ECM_HR = "354149531531";
    case ECM_LU = "354150604589";
    case ECM_MO = "354149704647";
    case ECM_PA = "354148474934";
    case ECM_PD = "354151811040";
    case ECM_PK = "354149587116";
    case ECM_PU = "354150397709";
    case ECM_PW = "354149831161";
    case ECM_PY = "354151744355";
    case ECM_PZ = "354149594316";
    case ECM_RC = "354147371406";
    case ECM_RL = "354150822796";
    case ECM_RM = "354151419720";
    case ECM_RV = "354151233328";
    case ECM_SC = "354149567318";
    case ECM_SD = "354151780535";
    case ECM_TA = "354151177884";
    case ECM_TC = "354150949541";
    case ECM_TX = "354151456195";
    case ECM_WS = "354149749732";
    case ECM_YS = "354150522514";
    
    case ECM_DEPARTMENTS = "354149908634";
    case ECM_LEGAL = "336160775495";
    case ECM_MAYOR = "336171664521";
    case ECM_PURCHASING = "336166331778";
    case ECM_RISK = "336171945517";
    case ECM_VENDOR = "345199902550";
    
    /*** End ***/
    
    /**
     * @return non-empty-string[]
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
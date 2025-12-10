<?php
declare(strict_types=1);

namespace Core\Contract\Enum;

Enum QueueFolderEnum: string
{
    /**
     * To flip back and forth between production and development, put a space between the asterisk and the slash
     * under the word production, and remove the space between under development, and vice versa.
     */
    
    /**
     * Production
     */
    case ECM_ONBASE = "348908106622";
    case ECM_TEMPLATES = "348908147055";
    
    case ECM_AC = "352155187097";
    case ECM_BD = "352158683991";
case ECM_BE = "352589456548";
    case ECM_CC = "352158515242";
    case ECM_CN = "352156775699";
    case ECM_ED = "352158738093";
    case ECM_EG = "352157531051";
case ECM_EM = "352587865757";
    case ECM_EO = "352153422658";
    case ECM_FD = "352155414876";
    case ECM_FN = "352157027667";
    case ECM_GC = "352154224263";
case ECM_HD = "352587945272";
case ECM_HR = "352386616195";
case ECM_IT = "352587776524";
case ECM_LU = "352587489095";
    case ECM_MO = "352156826206";
    case ECM_PA = "352155597129";
case ECM_PD = "352589142863";
    case ECM_PK = "352155378264";
    case ECM_PU = "352157774369";
case ECM_PW = "352588405548";
    case ECM_PY = "352157135066";
    case ECM_PZ = "352155522074";
    case ECM_RC = "352153609698";
    case ECM_RL = "352153854647";
    case ECM_RM = "352158656478";
    case ECM_RV = "352153619298";
    case ECM_SC = "352155160408";
    case ECM_SD = "352157783941";
    case ECM_TA = "352154416558";
    case ECM_TC = "352155030565";
    case ECM_TX = "352153976896";
    case ECM_WS = "352158966870";
    case ECM_YS = "352156770556";
    
    case ECM_DEPARTMENTS = "348908902955";
    case ECM_LEGAL = "348907511883";
    case ECM_MAYOR = "348911714273";
    case ECM_PURCHASING = "348907826208";
    case ECM_RISK = "348908361510";
    case ECM_VENDOR = "348910710012";
    
    /**
     * Development
     * /
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
    
    case DEPARTMENTS = "354149908634";
    case LEGAL = "336160775495";
    case MAYOR = "336171664521";
    case PURCHASING = "336166331778";
    case RISK = "336171945517";
    case VENDOR = "345199902550";
    
    /**
     * End
     */
    
    /**
     * @return non-empty-string[]
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
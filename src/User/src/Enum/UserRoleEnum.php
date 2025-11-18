<?php

declare(strict_types=1);

namespace Core\User\Enum;

use function array_filter;

enum UserRoleEnum: string
{
    case Guest = 'guest';
    case User  = 'user';
    
    case ECM_AC = 'ECM_AC';
    case ECM_BD = 'ECM_BD';
    case ECM_BE = 'ECM_BE';
    case ECM_CC = 'ECM_CC';
//     ONB - CDBG
    case ECM_CN = 'ECM_CN';
//     ONB - Department
    case ECM_ED = 'ECM_ED';
    case ECM_EG = 'ECM_EG';
    case ECM_EM = 'ECM_EM';
    case ECM_EO = 'ECM_EO';
    case ECM_FD = 'ECM_FD';
    case ECM_FN = 'ECM_FN';
    case ECM_GC = 'ECM_GC';
//     ONB - GC REVIEWER
    case ECM_HD = 'ECM_HD';
    case ECM_HR = 'ECM_HR';
    case ECM_IT = 'ECM_IT';
    case ECM_LU = 'ECM_LU';
    case ECM_MO = 'ECM_MO';
//     ONB - MO REVIEWER
    case ECM_PA = 'ECM_PA';
    case ECM_PD = 'ECM_PD';
    case ECM_PK = 'ECM_PK';
    case ECM_PU = 'ECM_PU';
//     ONB - PU REVIEWER
    case ECM_PW = 'ECM_PW';
    case ECM_PY = 'ECM_PY';
    case ECM_PZ = 'ECM_PZ';
    case ECM_RC = 'ECM_RC';
    case ECM_RL = 'ECM_RL';
    case ECM_RM = 'ECM_RM';
//     ONB - RM REVIEWER
    case ECM_RV = 'ECM_RV';
    case ECM_SC = 'ECM_SC';
    case ECM_SD = 'ECM_SD';
//     ONB - SuperUser
//     ONB - System Administrators
    case ECM_TA = 'ECM_TA';
    case ECM_TC = 'ECM_TC';
    case ECM_TX = 'ECM_TX';
    case ECM_WS = 'ECM_WS';
    case ECM_YS = 'ECM_YS';
//     ONBLegalAdmin
//     ONBLegalUsers
//     ONBPublicWorksScanning
//     ONBThickClients
//     ONBUsers
    case ECM_DEPARTMENT = 'ECM_DEPARTMENT';
    case ECM_LEGAL = 'ECM_LEGAL';
    case ECM_RISK = 'ECM_RISK';
    case ECM_PURCHASING = 'ECM_PURCHASING';
    case ECM_VENDOR = 'ECM_VENDOR';
    case ECM_MAYOR = 'ECM_MAYOR';
    
    case ECM_NO_NOTIFICATION = 'ECM_NO_NOTIFICATION';
    

    /**
     * @return array<int, self>
     */
    public static function validCases(): array
    {
        return array_filter(self::cases(), fn (self $value) => $value !== self::Guest);
    }
}

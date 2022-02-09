import React, { useState } from 'react'
import { fetchCivilizationsData } from '../fetch/fetchCivilizationsData'
import { Civilization } from '../types/civilizations'

export const Display: React.FC = () => {
  const [civData, setCivData] = useState<Civilization[]>([])
  const callFetch = async () => {
    const civDataReturned = await fetchCivilizationsData()
    setCivData(civDataReturned)
  }

  return (
    <div>
      <button onClick={callFetch}>Get Civilizations</button>
      <table>
        <tbody>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Expansion</th>
            <th>Army Type</th>
            <th>Team Bonus</th>
            <th>Civilization Bonus</th>
          </tr>
          {civData.map((data) => (
            <tr>
              <td>{data.id}</td>
              <td>{data.name}</td>
              <td>{data.expansion}</td>
              <td>{data.army_type}</td>
              <td>{data.team_bonus}</td>
              <td>
                <tr>
                  <td>{data.civilization_bonus_0}</td>
                  <td>{data.civilization_bonus_1}</td>
                  <td>{data.civilization_bonus_2}</td>
                  <td>{data.civilization_bonus_3}</td>
                  <td>{data.civilization_bonus_4}</td>
                </tr>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  )
}
